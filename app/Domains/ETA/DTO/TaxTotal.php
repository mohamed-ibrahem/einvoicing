<?php

namespace App\Domains\ETA\DTO;

class TaxTotal
{
    /**
     * @param  string|null  $taxType
     * @param  float|null  $amount
     */
    public function __construct(
        public readonly ?string $taxType,
        public readonly ?float $amount,
    ) {
        //
    }
}
