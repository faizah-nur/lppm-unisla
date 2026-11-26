<?php

namespace App\Filament\Resources\KknSchemeResource\Pages;

use App\Filament\Resources\KknSchemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKknSchemes extends ListRecords
{
    protected static string $resource = KknSchemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
