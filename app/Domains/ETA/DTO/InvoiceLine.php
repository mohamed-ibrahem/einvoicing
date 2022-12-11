<?php

namespace App\Domains\ETA\DTO;

class InvoiceLine
{
    /**
     * @param  string|null  $internalCode
     * @param  string|null  $description
     * @param  string|null  $itemType
     * @param  string|null  $itemCode
     * @param  string|null  $quantity
     * @param  string|null  $unitType
     * @param  string|null  $unitPrice
     * @param  string|null  $netSale
     * @param  string|null  $totalSale
     * @param  string|null  $total
     * @param  Discount[]|null  $commercialDiscountData
     * @param  Discount[]|null  $itemDiscountData
     * @param  string|null  $valueDifference
     * @param  TaxableItem[]|null  $taxableItems
     */
    public function __construct(
        public readonly ?string $internalCode,
        public readonly ?string $description,
        public readonly ?string $itemType,
        public readonly ?string $itemCode,
        public readonly ?string $quantity,
        public readonly ?string $unitType,
        public readonly ?string $unitPrice,
        public readonly ?string $netSale,
        public readonly ?string $totalSale,
        public readonly ?string $total,
        public readonly ?array $commercialDiscountData,
        public readonly ?array $itemDiscountData,
        public readonly ?string $valueDifference,
        public readonly ?array $taxableItems
    ) {
        //
    }
}
