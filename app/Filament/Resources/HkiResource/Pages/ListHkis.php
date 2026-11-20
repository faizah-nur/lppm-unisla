<?php

namespace App\Filament\Resources\HkiResource\Pages;

use App\Filament\Resources\HkiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHkis extends ListRecords
{
    protected static string $resource = HkiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
