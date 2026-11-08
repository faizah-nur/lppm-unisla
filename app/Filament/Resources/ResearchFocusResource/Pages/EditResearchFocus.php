<?php

namespace App\Filament\Resources\ResearchFocusResource\Pages;

use App\Filament\Resources\ResearchFocusResource;
use App\Models\ResearchFocus;
use Filament\Resources\Pages\EditRecord;

class EditResearchFocus extends EditRecord
{
    protected static string $resource = ResearchFocusResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['order'] = (int) ($data['order'] ?? 0);
        $data['is_featured'] = (bool) ($data['is_featured'] ?? false);

        // Jika featured, matikan featured lain (kecuali record ini)
        if ($data['is_featured']) {
            ResearchFocus::where('is_featured', true)
                ->where('id', '!=', $this->record->id)
                ->update(['is_featured' => false]);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
