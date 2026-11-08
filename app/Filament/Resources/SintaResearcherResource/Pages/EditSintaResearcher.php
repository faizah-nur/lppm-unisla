<?php

namespace App\Filament\Resources\SintaResearcherResource\Pages;

use App\Filament\Resources\SintaResearcherResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSintaResearcher extends EditRecord
{
    protected static string $resource = SintaResearcherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
