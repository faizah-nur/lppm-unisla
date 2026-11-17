<?php

namespace App\Filament\Resources\PartnershipDocumentResource\Pages;

use App\Filament\Resources\PartnershipDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipDocument extends EditRecord
{
    protected static string $resource = PartnershipDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
