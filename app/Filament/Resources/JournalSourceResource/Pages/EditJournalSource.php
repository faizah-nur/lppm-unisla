<?php

namespace App\Filament\Resources\JournalSourceResource\Pages;

use App\Filament\Resources\JournalSourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJournalSource extends EditRecord
{
    protected static string $resource = JournalSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
