<?php

namespace App\Filament\Resources\PartnershipDocumentResource\Pages;

use App\Filament\Resources\PartnershipDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnershipDocuments extends ListRecords
{
    protected static string $resource = PartnershipDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
