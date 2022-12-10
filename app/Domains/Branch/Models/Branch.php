<?php

namespace App\Domains\Branch\Models;

use App\Domains\ETA\Models\ActivityCodes;
use App\Domains\ETA\Models\CountryCodes;
use App\Domains\Invoice\Models\Invoice;
use App\Domains\User\Models\User;
use Database\Factories\BranchFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'sid',
        'type',
        'activity_code',
        'country',
        'region_city',
        'governate',
        'street',
        'building_number',
        'postal_code',
        'floor',
        'room',
        'landmark',
        'address_additional_information',
    ];

    /**
     * {@inheritDoc}
     *
     * @return BranchFactory
     */
    protected static function newFactory(): BranchFactory
    {
        return new BranchFactory();
    }

    /**
     * Determine if the given user can create a new branch.
     *
     * @param  User  $user
     * @return bool
     */
    public static function checkIfTheUserCanCreateBranches(User $user): bool
    {
        return true;
    }

    /**
     * Get all the users belongs to this branch.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Membership::class)
            ->withTimestamps()
            ->as('membership');
    }

    /**
     * Get all the branch invoices.
     *
     * @return HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get branch country.
     *
     * @return BelongsTo
     */
    public function country_relation(): BelongsTo
    {
        return $this->belongsTo(CountryCodes::class, 'country', 'code');
    }

    /**
     * Get activity code.
     *
     * @return BelongsTo
     */
    public function activity_code_relation(): BelongsTo
    {
        return $this->belongsTo(ActivityCodes::class, 'activity_code', 'code');
    }
}
