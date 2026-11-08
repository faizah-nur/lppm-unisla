<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use App\Models\Profile;
use Filament\Resources\Pages\ManageRecords;

class ManageProfiles extends ManageRecords
{
    protected static string $resource = ProfileResource::class;

    // 1. Sembunyikan tombol "Create" karena kita hanya butuh 1 data
    protected function getHeaderActions(): array
    {
        return [
            // Kosongkan agar tidak ada tombol tambah data
        ];
    }

    // 2. Otomatiskan pengisian data pertama (jika database kosong)
    public function mount(): void
    {
        if (Profile::count() === 0) {
            Profile::create([
                'vision' => 'Visi belum diatur.',
                'mission' => 'Misi belum diatur.',
                'history' => 'Sejarah belum diatur.',
            ]);
        }
    }
}
