<?php

namespace Database\Factories;

use App\Domains\Invoice\Models\Invoice;
use App\Domains\Invoice\Models\InvoiceLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/** @extends Factory<InvoiceLine> */
class InvoiceLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = InvoiceLine::class;

    /**
     * {@inheritDoc}
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'getData' => [
                'description' => fake()->sentence(),
                'itemType' => 'GS1',
                'itemCode' => 10003752,
                'unitType' => 'kg',
                'quantity' => fake()->randomNumber(),
                'unitValue' => [
                    'currencySold' => 'EGP',
                    'amountEGP' => fake()->randomNumber(),
                    'amountSold' => fake()->randomNumber(),
                    'currencyExchangeRate' => 0,
                ],
                'salesTotal' => fake()->randomNumber(),
                'total' => fake()->randomNumber(),
                'valueDifference' => fake()->randomNumber(),
                'totalTaxableFees' => fake()->randomNumber(),
                'netTotal' => fake()->randomNumber(),
                'itemsDiscount' => fake()->randomNumber(),
                'discount' => [
                    'rate' => fake()->randomNumber(),
                    'amount' => fake()->randomNumber(),
                ],
                'taxableItems' => [
                    [
                        'taxType' => 'T1',
                        'amount' => 490,
                        'subType' => 'V001',
                        'rate' => 14,
                    ],
                ],
                'internalCode' => fake()->randomNumber(),
            ],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'invoice_id' => Invoice::factory(),
        ];
    }
}
