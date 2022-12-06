<?php

namespace App\Domains\ETA\DTO;

class Discount
{
    /**
     * @param  string  $rate Discount percentage rate applied. Must be from 0 to 100.
     * @param  string  $amount Amount of discount provided to customer for this item. Should be smaller or equal to value Total. If percentage specified should be valid amount calculated from total by applying discount percentage. Value with the precision of 5 decimal digits.
     */
    public function __construct(
        public readonly string $rate,
        public readonly string $amount,
    ) {
        //
    }
}
