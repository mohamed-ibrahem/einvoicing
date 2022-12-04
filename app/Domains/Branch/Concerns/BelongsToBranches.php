<?php

namespace App\Domains\Branch\Concerns;

use App\Domains\Branch\Models\Branch;
use App\Domains\Branch\Models\Scopes\BelongsToBranch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToBranches
{
    /**
     * When the trait is booting.
     *
     * @return void
     */
    public static function bootBelongsToBranches(): void
    {
        static::addGlobalScope(new BelongsToBranch());

        static::creating(static function (Model $model) {
            if (!$model->relationLoaded('branch') && !$model->getAttribute(self::getTenantKeyName())) {
                $model->setAttribute(self::getTenantKeyName(), auth()->user()?->current_branch_id);
                $model->setRelation('branch', auth()->user()?->currentBranch());
            }
        });
    }

    /**
     * Get the associated branch model.
     *
     * @return BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(
            Branch::class,
            self::getTenantKeyName()
        );
    }

    /**
     * Get the primary key for the tenant model.
     *
     * @return string
     */
    public static function getTenantKeyName(): string
    {
        return Branch::getModel()->getForeignKey();
    }
}
