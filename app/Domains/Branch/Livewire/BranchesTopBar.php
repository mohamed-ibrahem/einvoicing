<?php

namespace App\Domains\Branch\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class BranchesTopBar extends Component
{
    protected $listeners = [
        'refresh-top-bar-menu' => '$refresh',
    ];

    public function render(): View
    {
        return view('livewire.branches-top-bar');
    }
}
