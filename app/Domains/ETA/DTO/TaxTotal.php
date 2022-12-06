<?php

namespace App\Domains\ETA\DTO;

class TaxTotal
{
    /**
     * @param  string  $taxType Type of tax applied - from the list of approved tax type codes. The TaxType needs to be unique across the invoice line (no VAT twice in one invoice line), TaxType is from the list of supported tax types.
     * @param  float  $amount Sum of all amounts of given tax in all invoice lines. 5 decimal digits allowed.
     */
    public function __construct(
        public readonly string $taxType,
        public readonly float $amount,
    ) {
        //
    }
}
