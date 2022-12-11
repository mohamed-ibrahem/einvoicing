<?php

namespace App\Domains\ETA\DTO;

class Value
{
    /**
     * @param  string|null  $currencySold
     * @param  string|null  $amountEGP
     * @param  string|null  $amountSold
     * @param  string|null  $currencyExchangeRate
     */
    public function __construct(
        public readonly ?string $currencySold,
        public readonly ?string $amountEGP,
        public readonly ?string $amountSold,
        public readonly ?string $currencyExchangeRate,
    ) {
        //
    }
}
