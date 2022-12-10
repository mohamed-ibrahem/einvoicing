<?php

namespace App\Domains\ETA\DTO;

class InvoiceLine
{
    /**
     * @param  string  $description Description of the item being sold.
     * @param  string  $itemType Coding schema used to encode the item type. Must be GS1 or EGS for this version.
     * @param  string  $itemCode Code of the goods or services item being sold. GS1 codes targeted for managing goods, EGS codes targeted for managing goods – goods or services.
     * @param  string  $unitType Code of the unit type used from the code table of the measures.
     * @param  string  $quantity Number of units of the defined unit type being sold. Number should be larger than 0.
     * @param  Value  $unitValue The structure defining the price of a single unit sold.
     * @param  string  $salesTotal Total amount for the invoice line considering quantity and unit price in EGP (with excluded factory amounts if they are present for specific types in documents).
     * @param  string  $total Total amount for the invoice line after adding all pricing items, taxes, removing discounts.
     * @param  string  $valueDifference Value difference when selling goods already taxed (accepts +/- numbers), e.g., factory value based.
     * @param  string  $totalTaxableFees Total amount of additional taxable fees to be used in final tax calculation.
     * @param  string  $netTotal Total amount for the invoice line after applying discount.
     * @param  string  $itemsDiscount Non-taxable items discount.
     * @param  Discount|null  $discount The structure defining the discount applied on a single unit sold.
     * @param  TaxableItem[]|null  $taxableItems List of taxable items. Can have zero or more of supported tax items below from the list of all tax types including VAT, WHT and table tax, local authority fees (municipality), development.
     * @param  string|null  $internalCode Internal code used for the product being sold – can be used to simplify references back to existing solution.
     */
    public function __construct(
        public readonly string $description,
        public readonly string $itemType,
        public readonly string $itemCode,
        public readonly string $unitType,
        public readonly string $quantity,
        public readonly Value $unitValue,
        public readonly string $salesTotal,
        public readonly string $total,
        public readonly string $valueDifference,
        public readonly string $totalTaxableFees,
        public readonly string $netTotal,
        public readonly string $itemsDiscount,
        public readonly ?Discount $discount = null,
        public readonly ?array $taxableItems = null,
        public readonly ?string $internalCode = null,
    ) {
        //
    }
}
