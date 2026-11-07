<?php

namespace App\Filament\Resources\ResearchFocusResource\Pages;

use App\Filament\Resources\ResearchFocusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResearchFocus extends EditRecord
{
    protected static string $resource = ResearchFocusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
