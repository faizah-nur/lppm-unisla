<?php

namespace App\Helpers;

class SintaHelper
{
    /**
     * Membersihkan string dari spasi berlebih dan karakter newline.
     */
    public static function cleanString(?string $text): string
    {
        if (! $text) {
            return '';
        }

        // Hapus spasi di awal/akhir dan ganti multiple spaces/newlines jadi 1 spasi
        return trim(preg_replace('/\s+/', ' ', $text));
    }

    /**
     * Mengubah format angka SINTA (misal: "1,234" atau "1.234") menjadi integer.
     */
    public static function parseNumber(?string $text): int
    {
        if (! $text) {
            return 0;
        }
        // Hapus semua karakter kecuali angka dan minus
        $clean = preg_replace('/[^\d-]/', '', $text);

        return (int) $clean;
    }
}
