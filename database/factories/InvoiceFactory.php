<?php

namespace Database\Factories;

use App\Domains\Branch\Models\Branch;
use App\Domains\Invoice\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/** @extends Factory<Invoice> */
class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Invoice::class;

    /**
     * {@inheritDoc}
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->unique()->uuid(),
            'data' => [
                'totalDiscountAmount' => fake()->randomNumber(),
                'totalSalesAmount' => fake()->randomNumber(),
                'netAmount' => fake()->randomNumber(),
                'taxTotals' => [
                    fake()->randomNumber(),
                    fake()->randomNumber(),
                ],
                'totalAmount' => fake()->randomNumber(),
                'extraDiscountAmount' => fake()->randomNumber(),
                'totalItemsDiscountAmount' => fake()->randomNumber(),
                'purchaseOrderReference' => fake()->sentence(),
                'purchaseOrderDescription' => fake()->sentence(),
                'salesOrderReference' => fake()->sentence(),
                'salesOrderDescription' => fake()->sentence(),
                'proformaInvoiceNumber' => fake()->sentence(),

                'customer' => [
                    'id' => fake()->randomNumber(),
                    'name' => fake()->name(),
                    'type' => 'B',
                    'address' => [
                        'country' => 'EG',
                        'regionCity' => fake()->city(),
                        'governate' => fake()->citySuffix(),
                        'street' => fake()->streetName(),
                        'buildingNumber' => fake()->buildingNumber(),
                        'postalCode' => fake()->postcode(),
                        'floor' => fake()->randomNumber(),
                        'room' => fake()->randomNumber(),
                        'landmark' => fake()->sentence(),
                        'additionalInformation' => null,
                    ],
                ],

                'payment' => [
                    'bankName' => fake()->sentence(),
                    'bankAddress' => fake()->streetAddress(),
                    'bankAccountNo' => fake()->creditCardNumber(),
                    'bankAccountIBAN' => fake()->iban(),
                    'swiftCode' => fake()->swiftBicNumber(),
                    'terms' => fake()->sentence(),
                ],

                'delivery' => [
                    'approach' => fake()->sentence(),
                    'packaging' => fake()->sentence(),
                    'dateValidity' => Carbon::now(),
                    'exportPort' => fake()->sentence(),
                    'countryOfOrigin' => fake()->countryISOAlpha3(),
                    'grossWeight' => fake()->randomNumber(),
                    'netWeight' => fake()->randomNumber(),
                    'terms' => fake()->sentence(),
                ],
            ],
            'branch_id' => Branch::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
