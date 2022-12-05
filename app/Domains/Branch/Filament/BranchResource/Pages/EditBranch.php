<?php

namespace App\Domains\Branch\Filament\BranchResource\Pages;

use App\Domains\Branch\Filament\BranchResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Pages\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBranch extends EditRecord
{
    protected static string $resource = BranchResource::class;

    protected function getActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $this->emit('refresh-top-bar-menu');
    }
}
