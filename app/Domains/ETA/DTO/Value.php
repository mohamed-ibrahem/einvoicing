<?php

namespace App\Domains\ETA\DTO;

class Value
{
    /**
     * @param  string|null  $currencySold Currency code used from ISO 4217.
     * @param  string|null  $amountEGP Price of unit of goods/services sold in EGP. Should be valid decimal with max 5 decimal digits. Value rounded to 5 decimal digits if calculated using currency sold and exchange rate.
     * @param  string|null  $amountSold Mandatory if currencySold <> EGP. Should not have value otherwise.
     * @param  string|null  $currencyExchangeRate Exchange rate of the Egyptian bank on the day of invoicing used to convert currency sold to the value of currency EGP. Mandatory if currencySold is not EGP. Should be valid decimal with max 5 decimal digits.
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
