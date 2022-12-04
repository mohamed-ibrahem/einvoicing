<?php

namespace App\Domains\Branch\Models;

use App\Domains\User\Models\User;
use Database\Factories\BranchFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'type',
        'activity_code',
        'client_id',
        'client_secret',
        'country',
        'region_city',
        'governate',
        'street',
        'building_number',
        'postal_code',
        'floor',
        'room',
        'landmark',
        'address_additional_information'
    ];

    /**
     * @inheritDoc
     * @return BranchFactory
     */
    protected static function newFactory(): BranchFactory
    {
        return new BranchFactory();
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
}
