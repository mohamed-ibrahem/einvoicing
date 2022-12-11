<?php

namespace App\Domains\ETA\DTO;

use JsonException;

class Receipt extends Document
{
    /**
     * Document type name. Must be s for receipts.
     *
     * @var array
     */
    public array $documentType = [
        'receiptType' => 'S',
        'typeVersion' => '1.2',
    ];

    /**
     * @param  Header  $header
     * @param  Seller  $seller
     * @param  Receiver  $buyer
     * @param  InvoiceLine[]  $itemData
     * @param  string  $totalSales
     * @param  string  $totalAmount
     * @param  string  $netAmount
     * @param  string  $paymentMethod
     * @param  string|null  $totalCommercialDiscount
     * @param  string|null  $totalItemsDiscount
     * @param  Discount[]|null  $extraReceiptDiscountData
     * @param  string|null  $feesAmount
     * @param  TaxTotal[]|null  $taxTotals
     * @param  string|null  $adjustment
     * @param  Contractor|null  $contractor
     * @param  Beneficiary|null  $beneficiary
     *
     * @throws JsonException
     */
    public function __construct(
        public readonly Header $header,
        public readonly Seller $seller,
        public readonly Receiver $buyer,
        public readonly array $itemData,
        public readonly string $totalSales,
        public readonly string $totalAmount,
        public readonly string $netAmount,
        public readonly string $paymentMethod,
        public readonly ?string $totalCommercialDiscount = null,
        public readonly ?string $totalItemsDiscount = null,
        public readonly ?array $extraReceiptDiscountData = null,
        public readonly ?string $feesAmount = null,
        public readonly ?array $taxTotals = null,
        public readonly ?string $adjustment = null,
        public readonly ?Contractor $contractor = null,
        public readonly ?Beneficiary $beneficiary = null,
    ) {
        parent::__construct();
    }
}
