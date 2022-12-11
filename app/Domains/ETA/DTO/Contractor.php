<?php

namespace App\Domains\ETA\DTO;

class Contractor
{
    /**
     * @param  string|null  $name
     * @param  string|null  $amount
     * @param  string|null  $rate
     */
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $amount,
        public readonly ?string $rate,
    ) {
        //
    }
}
