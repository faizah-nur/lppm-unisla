<?php

namespace App\Filament\Resources\OrganizationMemberResource\Pages;

use App\Filament\Resources\OrganizationMemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizationMember extends CreateRecord
{
    protected static string $resource = OrganizationMemberResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['order'] = (int) ($data['order'] ?? 0);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
