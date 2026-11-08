<?php

namespace App\Filament\Resources\ResearchFocusResource\Pages;

use App\Filament\Resources\ResearchFocusResource;
use App\Models\ResearchFocus;
use Filament\Resources\Pages\CreateRecord;

class CreateResearchFocus extends CreateRecord
{
    protected static string $resource = ResearchFocusResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Lapisan kedua: paksa order jadi 0 jika null
        $data['order'] = (int) ($data['order'] ?? 0);
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        // Jika featured, matikan featured lain
        if ($data['is_featured']) {
            ResearchFocus::where('is_featured', true)->update(['is_featured' => false]);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
