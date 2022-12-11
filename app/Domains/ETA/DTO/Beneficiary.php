<?php

namespace App\Domains\ETA\DTO;

class Beneficiary
{
    /**
     * @param  string|null  $amount
     * @param  string|null  $rate
     */
    public function __construct(
        public readonly ?string $amount,
        public readonly ?string $rate,
    ) {
        //
    }
}
