<?php

namespace App\Domains\Branch\Http\Controllers;

use App\Domains\Branch\Models\Branch;
use App\Http\Controllers\Controller;
use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UpdateCurrentBranchController extends Controller
{
    /**
     * Update the authenticated user's current branch.
     *
     * @param  Request  $request
     * @param  Branch  $branch
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Branch $branch): RedirectResponse
    {
        if (! $request->user()->switchBranch($branch)) {
            abort(403);
        }

        Filament::notify(
            'success',
            "Now viewing '$branch->name'",
            true
        );

        return redirect(config('filament.home_url'), 303);
    }
}
