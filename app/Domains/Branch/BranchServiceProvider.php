<?php

namespace App\Domains\Branch;

use App\Domains\Branch\Filament\BranchResource;
use App\Domains\Branch\Livewire\BranchesTopBar;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire;

class BranchServiceProvider extends PluginServiceProvider
{
    public static string $name = 'branch_domain';

    protected array $resources = [
        BranchResource::class,
    ];

    public function packageBooted(): void
    {
        parent::packageBooted();

        Livewire::component('branch_top_bar_menu', BranchesTopBar::class);

        Filament::registerRenderHook(
            'user-menu.start',
            static fn (): string => Blade::render('@livewire(\'branch_top_bar_menu\')')
        );
    }
}
