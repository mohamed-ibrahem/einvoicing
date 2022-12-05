<?php

namespace App\Domains\Branch\Policies;

use App\Domains\Branch\Models\Branch;
use App\Domains\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Branch $branch): bool
    {
        return $user->belongsToBranch($branch);
    }

    public function create(User $user): bool
    {
        return Branch::checkIfTheUserCanCreateBranches($user);
    }

    public function update(User $user, Branch $branch): bool
    {
        return $user->belongsToBranch($branch);
    }

    public function delete(User $user, Branch $branch): bool
    {
        return $user->belongsToBranch($branch);
    }

    public function restore(User $user, Branch $branch): bool
    {
        return $user->belongsToBranch($branch);
    }

    public function forceDelete(User $user, Branch $branch): bool
    {
        return $user->belongsToBranch($branch);
    }
}
