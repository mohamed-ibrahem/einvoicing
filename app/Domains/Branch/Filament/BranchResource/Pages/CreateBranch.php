<?php

namespace App\Domains\Branch\Filament\BranchResource\Pages;

use App\Domains\Branch\Filament\BranchResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBranch extends CreateRecord
{
    protected static string $resource = BranchResource::class;
}
