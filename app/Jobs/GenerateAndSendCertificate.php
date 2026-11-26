<?php

namespace App\Jobs;

use App\Mail\CertificateMail;
use App\Models\EventRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GenerateAndSendCertificate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $registration;

    public function __construct(EventRegistration $registration)
    {
        $this->registration = $registration;
    }

    public function handle(): void
    {
        $event = $this->registration->event;

        // Pastikan template sertifikat ada
        if (! $event || ! $event->certificate_template_path) {
            Log::error('Template sertifikat tidak ditemukan untuk event ID: '.($event->id ?? 'null'));

            return;
        }

        $templatePath = storage_path('app/public/'.$event->certificate_template_path);

        // Pastikan file template benar-benar ada
        if (! file_exists($templatePath)) {
            Log::error('File template tidak ditemukan di path: '.$templatePath);

            return;
        }

        // Pastikan folder certificates sudah ada
        if (! Storage::disk('public')->exists('certificates')) {
            Storage::disk('public')->makeDirectory('certificates');
        }

        try {
            // Inisialisasi Intervention Image v4
            $manager = new ImageManager(new Driver);
            $image = $manager->decode(file_get_contents($templatePath));

            // Teks yang akan ditulis
            $name = $this->registration->full_name;
            $nipNidn = $this->registration->nip_nidn ? 'NIP/NIDN: '.$this->registration->nip_nidn : '';
            $text = trim($name.($nipNidn ? "\n".$nipNidn : ''));

            // Koordinat posisi teks
            $x = (int) ($event->cert_x_position ?? round($image->width() / 2));
            $y = (int) ($event->cert_y_position ?? round($image->height() / 2));

            // Tulis teks di atas sertifikat
            $fontPath = public_path('fonts/Roboto-Regular.ttf');

            $image->text($text, $x, $y, function ($font) use ($fontPath) {
                $font->size(38);
                $font->color('#111827');
                $font->align('center', 'top');
                $font->lineHeight(1.5);

                if (file_exists($fontPath)) {
                    $font->file($fontPath);
                }
            });

            // Encode gambar ke format JPG
            $encoded = $image->encodeUsingFileExtension('jpg');

            // Simpan gambar ke storage publik
            $fileName = 'certificates/cert_'.$this->registration->id.'_'.time().'.jpg';
            Storage::disk('public')->put($fileName, (string) $encoded);

            // Kirim Email
            Mail::to($this->registration->email)->send(new CertificateMail($this->registration, $fileName));

            // Tandai sudah terkirim
            $this->registration->update(['is_certified' => true]);

            Log::info('Sertifikat berhasil dibuat & dikirim untuk: '.$this->registration->email);

        } catch (\Throwable $e) {
            Log::error('Gagal generate sertifikat: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e; // Lempar error agar job ditandai FAILED
        }
    }
}
