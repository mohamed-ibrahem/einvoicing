<?php

namespace App\Domains\ETA\DTO;

class TaxableItem
{
    /**
     * @param  string  $taxType Type of tax applied - from the list of approved tax type codes. The TaxType needs to be unique across the invoice line (no VAT twice in one invoice line), TaxType is from the list of supported tax types.
     * @param  string  $amount Amount of the tax applied – tax type defined type of tax applies to support different taxes that are possible depending on the type of sales, customer etc. Value with the precision of 5
     * @param  string  $subType Subtype of the tax type that might mean exemption rate is applied or specific rate linked to product type being sold is applied.
     * @param  string  $rate Tax rate applied for the invoice line. Value from 0 to 100.
     */
    public function __construct(
        public readonly string $taxType,
        public readonly string $amount,
        public readonly string $subType,
        public readonly string $rate,
    ) {
        //
    }
}
