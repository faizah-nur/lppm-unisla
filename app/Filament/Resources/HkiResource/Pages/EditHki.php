<?php

namespace App\Filament\Resources\HkiResource\Pages;

use App\Filament\Resources\HkiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHki extends EditRecord
{
    protected static string $resource = HkiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
