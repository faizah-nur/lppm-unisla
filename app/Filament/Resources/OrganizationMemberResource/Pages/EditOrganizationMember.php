<?php

namespace App\Filament\Resources\OrganizationMemberResource\Pages;

use App\Filament\Resources\OrganizationMemberResource;
use Filament\Resources\Pages\EditRecord;

class EditOrganizationMember extends EditRecord
{
    protected static string $resource = OrganizationMemberResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['order'] = (int) ($data['order'] ?? 0);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
