<?php

namespace App\Domains\ETA\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonException;

abstract class Document implements Arrayable, Jsonable
{
    /**
     * Document type name. Must be i for invoice.
     *
     * @var string|null
     */
    public ?string $documentType = null;

    /**
     * Document type version name. Must be 1.0 for this version.
     *
     * @var string|null
     */
    public ?string $documentTypeVersion = null;

    /**
     * Structure containing one or two digital signatures. At least signature of the Issuer must be present. Signature of the Service provider is optional.
     *
     * @var Signature[]
     */
    public ?array $signatures = null;

    /**
     * @param  Issuer|null  $issuer Structure representing the issuer information.
     * @param  Receiver|null  $receiver Structure representing the receiver.
     * @param  string|null  $dateTimeIssued The date and time when the document was issued. Date and time cannot be in future. Time to be supplied in UTC timezone.
     * @param  string|null  $taxpayerActivityCode Tax activity code of the business issuing the document representing the activity that caused it to be issued. Must be valid activity type code.
     * @param  string|null  $internalID Internal document ID used to link back to the ERP document number. Value defined by the submitter.
     * @param  float|null  $totalDiscountAmount Total amount of discounts: sum of all Discount amount elements of InvoiceLine items.
     * @param  float|null  $totalSalesAmount Sum all InvoiceLine/SalesTotal items.
     * @param  float|null  $netAmount TotalSales – TotalDiscount
     * @param  TaxTotal[]|null  $taxTotals Totals per tax type.
     * @param  float|null  $totalAmount Total amount of the invoice calculated as NetAmount + Totals of tax amounts. 5 decimal digits allowed.
     * @param  float|null  $extraDiscountAmount Additional discount amount applied at the level of the overall document, not individual lines.
     * @param  float|null  $totalItemsDiscountAmount Total amount of item discounts: sum of all Item Discount amount elements of InvoiceLine items.
     * @param  InvoiceLine[]|null  $invoiceLines Invoice lines of the invoice. Needs to have at least one invoice line.
     * @param  string|null  $purchaseOrderReference Reference to purchase order that this document is related to.
     * @param  string|null  $purchaseOrderDescription Additional information about the purchase order provided to the recipient of the document.
     * @param  string|null  $salesOrderReference Reference to the previous sales order for informational purposes.
     * @param  string|null  $salesOrderDescription Additional information about the sales order provided to the recipient of the document.
     * @param  string|null  $proformaInvoiceNumber Reference to the previous proforma invoice.
     * @param  Payment|null  $payment Structure containing fields providing information on how payments needs to be made.
     * @param  Delivery|null  $delivery Structure containing fields providing information on how the delivery of goods.
     *
     * @throws JsonException
     */
    public function __construct(
        public readonly ?Issuer $issuer,
        public readonly ?Receiver $receiver,
        public readonly ?string $dateTimeIssued,
        public readonly ?string $taxpayerActivityCode,
        public readonly ?string $internalID,
        public readonly ?float $totalDiscountAmount = 0.0,
        public readonly ?float $totalSalesAmount = 0.0,
        public readonly ?float $netAmount = 0.0,
        public readonly ?array $taxTotals = [],
        public readonly ?float $totalAmount = 0.0,
        public readonly ?float $extraDiscountAmount = 0.0,
        public readonly ?float $totalItemsDiscountAmount = 0.0,
        public readonly ?array $invoiceLines = [],
        public readonly ?string $purchaseOrderReference = null,
        public readonly ?string $purchaseOrderDescription = null,
        public readonly ?string $salesOrderReference = null,
        public readonly ?string $salesOrderDescription = null,
        public readonly ?string $proformaInvoiceNumber = null,
        public readonly ?Payment $payment = null,
        public readonly ?Delivery $delivery = null,
    ) {
        $this->signatures = [
            [
                'signatureType' => 'I',
                'value' => Signature::serialize($this->toArray()),
            ],
        ];
    }

    /**
     * Get the document as array.
     *
     * @return array
     *
     * @throws JsonException
     */
    public function toArray(): array
    {
        return array_filter($this->toJson());
    }

    /**
     * Get the document as json array.
     *
     * @param  int  $options
     * @return array
     *
     * @throws JsonException
     */
    public function toJson($options = 0): array
    {
        return json_decode(json_encode($this, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
    }
}
