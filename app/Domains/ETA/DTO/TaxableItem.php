<?php

namespace App\Domains\ETA\DTO;

class TaxableItem
{
    /**
     * @param  string|null  $taxType
     * @param  string|null  $amount
     * @param  string|null  $subType
     * @param  string|null  $rate
     */
    public function __construct(
        public readonly ?string $taxType,
        public readonly ?string $amount,
        public readonly ?string $subType,
        public readonly ?string $rate,
    ) {
        //
    }
}
