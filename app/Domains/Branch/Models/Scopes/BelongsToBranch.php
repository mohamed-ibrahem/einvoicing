<?php

namespace App\Domains\Branch\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use InvalidArgumentException;

class BelongsToBranch implements Scope
{
    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (! method_exists($model, 'getTenantKeyName')) {
            throw new InvalidArgumentException('Please use the BelongsToBranch trait or add getTenantKeyName() method');
        }

        if (auth()->check()) {
            $builder->where(
                $model->qualifyColumn($model::getTenantKeyName()),
                auth()->user()->current_branch_id,
            );
        }
    }

    /**
     * Extend query builder functionality.
     *
     * @param  Builder  $builder
     * @return void
     */
    public function extend(Builder $builder): void
    {
        $builder->macro('withoutBranches', function (Builder $builder) {
            return $builder->withoutGlobalScope($this);
        });
    }
}
