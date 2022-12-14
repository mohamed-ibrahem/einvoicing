<?php

namespace App\Domains\ETA\DTO;

class Discount
{
    /**
     * @param  string|null  $discount
     * @param  string|null  $amount
     */
    public function __construct(
        public readonly ?string $discount,
        public readonly ?string $amount,
    ) {
        //
    }
}
