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
     * @inheritDoc
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => 'B',
            'activity_code' => 123,
            'clientID' => 'e0eba311-6e5e-4d82-bff4-402ac46fc36b',
            'clientSecret' => '73d76777-aa79-403c-8298-5338ae2b7d7d',
            'country' => 'EG',
            'regionCity' => $this->faker->city(),
            'governate' => $this->faker->citySuffix(),
            'street' => $this->faker->streetName(),
            'buildingNumber' => $this->faker->buildingNumber(),
            'postalCode' => $this->faker->postcode(),
            'floor' => $this->faker->randomNumber(),
            'room' => $this->faker->randomNumber(),
            'landmark' => $this->faker->shuffleString(),
            'additionalInformation' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
