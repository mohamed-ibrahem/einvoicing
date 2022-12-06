<?php

namespace Database\Factories;

use App\Domains\Branch\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Branch::class;

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => 'B',
            'activity_code' => 123,
            'country' => 'EG',
            'region_city' => fake()->city(),
            'governate' => fake()->citySuffix(),
            'street' => fake()->streetName(),
            'building_number' => fake()->buildingNumber(),
            'postal_code' => fake()->postcode(),
            'floor' => fake()->randomNumber(),
            'room' => fake()->randomNumber(),
            'landmark' => fake()->shuffleString(),
            'address_additional_information' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
