<?php

namespace App\Domains\Branch;

use App\Domains\Branch\Filament\BranchResource;
use Filament\PluginServiceProvider;

class BranchServiceProvider extends PluginServiceProvider
{
    public static string $name = 'branch_domain';

    protected array $resources = [
        BranchResource::class,
    ];
}
