<?php

namespace App\Jobs;

use App\Helpers\SintaHelper;
use App\Models\SintaResearcher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SyncSintaResearchersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 7200; // 2 jam batas waktu

    protected $affiliationId;

    public function __construct($affiliationId = '2093')
    {
        $this->affiliationId = $affiliationId;
    }

    public function handle(): void
    {
        Log::info("=== MEMULAI SINKRONISASI SINTA (Afiliasi: {$this->affiliationId}) ===");

        $page = 1;
        $hasMorePages = true;
        $totalSaved = 0;

        while ($hasMorePages) {
            $url = "https://sinta.kemdiktisaintek.go.id/affiliations/authors/{$this->affiliationId}?page={$page}";
            Log::info("Mengakses halaman: {$url}");

            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                ])->timeout(30)->get($url);

                if (! $response->successful()) {
                    Log::error('Gagal mengakses halaman afiliasi. Status: '.$response->status());
                    break;
                }

                $dom = new \DOMDocument;
                @$dom->loadHTML($response->body());
                $xpath = new \DOMXPath($dom);

                // Mencari blok konten utama peneliti
                $authorNodes = $xpath->query("//div[contains(@class, 'content')]//a");

                if ($authorNodes->length === 0) {
                    Log::info("Tidak ada peneliti ditemukan di halaman {$page}. Menghentikan loop.");
                    $hasMorePages = false;
                    break;
                }

                Log::info('Ditemukan '.$authorNodes->length." peneliti di halaman {$page}.");

                foreach ($authorNodes as $node) {
                    $profileUrl = $node->getAttribute('href');
                    $name = SintaHelper::cleanString($node->textContent);

                    // Ekstrak ID dari URL profil
                    if (preg_match('/profile\/(\d+)/', $profileUrl, $matches)) {
                        $sintaId = $matches[1];
                        $this->fetchResearcherDetail($sintaId, $name);
                        $totalSaved++;
                        sleep(1); // Jeda agar tidak diblokir
                    }
                }

                $page++;
            } catch (\Exception $e) {
                Log::error("Error pada halaman {$page}: ".$e->getMessage());
                break;
            }
        }

        Log::info("=== SINKRONISASI SELESAI. Total diproses: {$totalSaved} ===");
    }

    protected function fetchResearcherDetail($sintaId, $fallbackName = '')
    {
        $profileUrl = "https://sinta.kemdiktisaintek.go.id/authors/profile/{$sintaId}";

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            ])->timeout(30)->get($profileUrl);

            if (! $response->successful()) {
                return;
            }

            $dom = new \DOMDocument;
            @$dom->loadHTML($response->body());
            $xpath = new \DOMXPath($dom);

            // 1. Nama Lengkap
            $nameNode = $xpath->query("//div[contains(@class, 'nama')]")->item(0);
            $name = $nameNode ? SintaHelper::cleanString($nameNode->textContent) : $fallbackName;

            // 2. Program Studi
            $prodi = null;
            $prodiNode = $xpath->query("//div[contains(@class, 'meta-profile')]")->item(0);
            if ($prodiNode) {
                $metaText = SintaHelper::cleanString($prodiNode->textContent);
                if (preg_match('/(S\d\s*-\s*[a-zA-Z\s]+)/i', $metaText, $matches)) {
                    $prodi = trim($matches[1]);
                    $prodi = str_ireplace('SINTA ID', '', $prodi);
                    $prodi = SintaHelper::cleanString($prodi);
                }
            }

            // 3. Ekstraksi & UNDUH Foto Profil
            $imageUrl = null;
            $imageNode = $xpath->query("//div[contains(@class, 'profile-picture')]//img | //div[contains(@class, 'img-profile')]//img")->item(0);

            if ($imageNode) {
                $rawImageUrl = $imageNode->getAttribute('src');

                if ($rawImageUrl && str_starts_with($rawImageUrl, '/')) {
                    $rawImageUrl = 'https://sinta.kemdiktisaintek.go.id'.$rawImageUrl;
                }

                if ($rawImageUrl) {
                    try {
                        $imgResponse = Http::withHeaders([
                            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                        ])->timeout(15)->get($rawImageUrl);

                        if ($imgResponse->successful() && $imgResponse->body()) {
                            $filename = "researchers/{$sintaId}.jpg";
                            Storage::disk('public')->put($filename, $imgResponse->body());
                            $imageUrl = $filename;
                        } else {
                            Log::warning("Gagal mengunduh gambar dari URL: {$rawImageUrl} (Status: ".$imgResponse->status().')');
                        }
                    } catch (\Exception $e) {
                        Log::warning("Error saat mengunduh foto ID {$sintaId}: ".$e->getMessage());
                    }
                }
            }

            // FALLBACK: Jika gambar dari SINTA gagal, buat Avatar Inisial
            if (! $imageUrl && $name) {
                $initials = urlencode(collect(explode(' ', $name))->map(fn ($segment) => mb_substr($segment, 0, 1))->take(2)->implode(''));
                $imageUrl = "https://ui-avatars.com/api/?name={$initials}&background=10b981&color=fff&size=256&bold=true";
            }

            // 4. Skor & H-Index
            $sintaScore3Yr = 0;
            $sintaScoreOverall = 0;
            $scopusHindex = 0;
            $gsHindex = 0;
            $sintaHindex = 0; // Default 0

            $statsNodes = $xpath->query("//div[contains(@class, 'pr-num')]");
            foreach ($statsNodes as $statNode) {
                $parent = $statNode->parentNode;
                $label = strtolower($parent->textContent);
                $number = SintaHelper::parseNumber($statNode->textContent);

                if (str_contains($label, 'sinta score overall')) {
                    $sintaScoreOverall = $number;
                }
                if (str_contains($label, 'sinta score 3yr')) {
                    $sintaScore3Yr = $number;
                }
            }

            $rows = $xpath->query('//table//tr');
            foreach ($rows as $row) {
                $cells = $xpath->query('td', $row);
                if ($cells->length >= 3) {
                    $label = strtolower(SintaHelper::cleanString($cells->item(0)->textContent));
                    if ($label === 'h-index') {
                        $scopusHindex = SintaHelper::parseNumber($cells->item(1)->textContent);
                        $gsHindex = SintaHelper::parseNumber($cells->item(2)->textContent);
                    }
                }
            }

            // 5. Simpan ke Database
            SintaResearcher::updateOrCreate(
                ['sinta_id' => $sintaId],
                [
                    'name' => $name,
                    'study_program' => $prodi,
                    'affiliation' => 'Universitas Islam Lamongan',
                    'sinta_score_overall' => $sintaScoreOverall,
                    'sinta_score_3yr' => $sintaScore3Yr,
                    'scopus_hindex' => $scopusHindex,
                    'gs_hindex' => $gsHindex,
                    'sinta_hindex' => $sintaHindex,
                    'image_url' => $imageUrl,
                    'profile_url' => $profileUrl,
                    'last_synced_at' => now(),
                ]
            );

            Log::info("Sinkron: {$name} | Prodi: {$prodi} | Foto: ".($imageUrl ? 'Berhasil' : 'Kosong'));

        } catch (\Exception $e) {
            Log::error("Gagal mengambil profil {$sintaId}: ".$e->getMessage());
        }
    }
}
