<?php

namespace App\Domains\Branch\Concerns;

use App\Domains\Branch\Models\Branch;
use App\Domains\Branch\Models\Membership;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasBranches
{
    /**
     * Get the current branch of the user's context.
     *
     * @return BelongsTo
     */
    public function currentBranch(): BelongsTo
    {
        if (is_null($this->current_branch_id) && $this->id) {
            $this->switchBranch($this->nearestBranch());
        }

        return $this->belongsTo(Branch::class, 'current_branch_id');
    }

    /**
     * Get all the branches the user belongs to.
     *
     * @return BelongsToMany
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, Membership::class)
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get latest branch.
     *
     * @return Branch|null
     */
    public function nearestBranch(): ?Branch
    {
        return $this->branches()->latest()->first();
    }

    /**
     * Switch the user's context to the given branch.
     *
     * @param  Branch|null  $branch
     * @return bool
     */
    public function switchBranch(?Branch $branch = null): bool
    {
        if (is_null($branch) || ! $this->belongsToBranch($branch)) {
            return false;
        }

        $this->forceFill([
            'current_branch_id' => $branch->id,
        ])->save();

        $this->setRelation('currentBranch', $branch);

        return true;
    }

    /**
     * Determine if the user belongs to the given branch.
     *
     * @param  Branch|null  $branch
     * @return bool
     */
    public function belongsToBranch(?Branch $branch): bool
    {
        if (is_null($branch)) {
            return false;
        }

        return $this->branches->contains(fn ($t) => $t->id === $branch->id);
    }

    /**
     * Determine if the given branch is the current branch.
     *
     * @param  Branch  $branch
     * @return bool
     */
    public function isCurrentBranch(Branch $branch): bool
    {
        return $branch->getKey() === $this->current_branch_id;
    }
}
