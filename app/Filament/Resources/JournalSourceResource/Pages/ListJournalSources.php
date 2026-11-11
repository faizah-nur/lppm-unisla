<?php

namespace App\Filament\Resources\JournalSourceResource\Pages;

use App\Filament\Resources\JournalSourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJournalSources extends ListRecords
{
    protected static string $resource = JournalSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
