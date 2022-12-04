<?php

namespace App\Domains\User\Filament\UserResource\Pages;

use App\Domains\User\Filament\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['current_branch_id'] = auth()->user()->current_branch_id;

        return $data;
    }

    public function afterCreate(): void
    {
        auth()->user()->currentBranch->users()->attach($this->record);
    }
}
