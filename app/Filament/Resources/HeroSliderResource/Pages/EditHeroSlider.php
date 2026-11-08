<?php

namespace App\Filament\Resources\HeroSliderResource\Pages;

use App\Filament\Resources\HeroSliderResource;
use Filament\Resources\Pages\EditRecord;

class EditHeroSlider extends EditRecord
{
    protected static string $resource = HeroSliderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['order'] = (int) ($data['order'] ?? 0);
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['btn_link'] = filled($data['btn_link'] ?? null) ? trim($data['btn_link']) : null;

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
