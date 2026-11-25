<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SiakadService
{
    protected string $baseUrl;

    protected ?string $apiKey;

    public function __construct()
    {
        // Pastikan URL di .env mengarah ke endpoint lengkap
        $this->baseUrl = config('services.siakad.url') ?: env('SIAKAD_API_URL', 'https://api.unisla.ac.id/open/daftardosen');
        $this->apiKey = config('services.siakad.key') ?: env('SIAKAD_API_KEY');
    }

    public function validateDosen(string $nidn, ?string $kodeProdi = null): array
    {
        $cleanNidn = trim($nidn);
        $prodiKey = $kodeProdi ?: '15401';

        $cacheKey = 'siakad_dosen_'.$cleanNidn.'_'.$prodiKey;

        $cachedData = Cache::get($cacheKey);
        if ($cachedData) {
            return $cachedData;
        }

        try {
            // 1. Gunakan GET, bukan POST. Jangan kirim body untuk GET.
            // 2. Kirim kodeprodi sebagai query parameter.
            $url = $this->baseUrl.'?kodeprodi='.urlencode($prodiKey);

            // 3. Siapkan Header (x-api-key)
            $headers = [
                'Accept' => 'application/json',
            ];

            if (! empty($this->apiKey)) {
                $headers['x-api-key'] = $this->apiKey;
            }

            // 4. Tembak API dengan metode GET
            $response = Http::timeout(10)
                ->withoutVerifying()
                ->withHeaders($headers)
                ->get($url);

            if ($response->successful()) {
                $data = $response->json();

                // Deteksi list dosen (biasanya ada di dalam key 'data')
                $dosenList = $data['data'] ?? $data;

                if (is_array($dosenList)) {
                    foreach ($dosenList as $dosen) {
                        $dosenNidn = trim((string) ($dosen['NIDN'] ?? ''));

                        if ($dosenNidn === $cleanNidn) {
                            $result = [
                                'status' => true,
                                'nama' => $dosen['NAMA'] ?? 'Nama tidak ditemukan',
                                'message' => 'Dosen ditemukan.',
                            ];
                            Cache::put($cacheKey, $result, now()->addHours(24));

                            return $result;
                        }
                    }
                }

                // Jika loop selesai dan tidak ada yang cocok
                $result = [
                    'status' => false,
                    'nama' => null,
                    'message' => 'NIDN tidak terdaftar di SIAKAD Unisla.',
                ];
                Cache::put($cacheKey, $result, now()->addMinutes(10));

                return $result;
            }

            // Jika response tidak 2xx
            throw new \Exception('HTTP '.$response->status().': '.$response->body());
        } catch (\Exception $e) {
            Log::error('Siakad API Error: '.$e->getMessage());

            return [
                'status' => 'error',
                'nama' => null,
                'message' => 'Gagal memverifikasi NIDN. Pastikan koneksi internet stabil atau coba beberapa saat lagi.',
            ];
        }
    }
}
