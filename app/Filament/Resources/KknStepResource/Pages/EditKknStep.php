<?php

namespace App\Filament\Resources\KknStepResource\Pages;

use App\Filament\Resources\KknStepResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKknStep extends EditRecord
{
    protected static string $resource = KknStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
