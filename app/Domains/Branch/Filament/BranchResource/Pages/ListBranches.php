<?php

namespace App\Domains\Branch\Filament\BranchResource\Pages;

use App\Domains\Branch\Filament\BranchResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBranches extends ListRecords
{
    protected static string $resource = BranchResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
