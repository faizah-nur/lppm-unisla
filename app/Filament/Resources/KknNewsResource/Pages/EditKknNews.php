<?php

namespace App\Filament\Resources\KknNewsResource\Pages;

use App\Filament\Resources\KknNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKknNews extends EditRecord
{
    protected static string $resource = KknNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
