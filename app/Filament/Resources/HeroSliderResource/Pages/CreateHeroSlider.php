<?php

namespace App\Filament\Resources\HeroSliderResource\Pages;

use App\Filament\Resources\HeroSliderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroSlider extends CreateRecord
{
    protected static string $resource = HeroSliderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Lapisan kedua: paksa order jadi 0 jika null
        $data['order'] = (int) ($data['order'] ?? 0);

        // Pastikan is_active jadi boolean
        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        // Sanitasi btn_link: trim, dan jika kosong jadikan null
        $data['btn_link'] = filled($data['btn_link'] ?? null) ? trim($data['btn_link']) : null;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
