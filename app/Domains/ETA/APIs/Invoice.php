<?php

namespace App\Domains\ETA\APIs;

use App\Domains\Invoice\Models\Invoice as InvoiceModel;
use App\Domains\Invoice\Models\InvoiceLine;
use App\Domains\ETA\DTO;
use App\Domains\ETA\Exceptions\BadRequestException;
use Illuminate\Support\Carbon;

class Invoice extends Api
{
    /**
     * @param InvoiceModel $invoice
     * @return void
     * @throws BadRequestException
     */
    public function submit(InvoiceModel $invoice): void
    {
        $auth = app(Auth::class)->login($invoice->branch);

        $document = $this->getInvoice($invoice);

        $response = $this->asJson()
            ->withToken($auth->token, $auth->tokenType)
            ->post('/documentsubmissions', [
                'documents' => [
                    $document
                ]
            ]);

        dd($response);
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\Invoice
     */
    private function getInvoice(InvoiceModel $invoice): DTO\Invoice
    {
        return new DTO\Invoice(
            $this->getIssuer($invoice),
            $this->getReceiver($invoice),
            $invoice->created_at->toDateTimeLocalString(),
            $invoice->branch->activity_code,
            $invoice->uuid,
            $invoice->data('totalDiscountAmount'),
            $invoice->data('totalSalesAmount'),
            $invoice->data('netAmount'),
            $this->getTaxTotals($invoice),
            $invoice->data('totalAmount'),
            $invoice->data('extraDiscountAmount'),
            $invoice->data('totalItemsDiscountAmount'),
            $this->getInvoiceLines($invoice),
            $invoice->data('purchaseOrderReference'),
            $invoice->data('purchaseOrderDescription'),
            $invoice->data('salesOrderReference'),
            $invoice->data('salesOrderDescription'),
            $invoice->data('proformaInvoiceNumber'),
            $this->getPayment($invoice),
            $this->getDelivery($invoice),
        );
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\Issuer
     */
    private function getIssuer(InvoiceModel $invoice): DTO\Issuer
    {
        return new DTO\Issuer(
            $invoice->branch->id,
            $invoice->branch->name,
            $invoice->branch->type,
            new DTO\Address(
                $invoice->branch->country,
                $invoice->branch->region_city,
                $invoice->branch->governate,
                $invoice->branch->street,
                $invoice->branch->building_number,
                $invoice->branch->id,
                $invoice->branch->postal_code,
                $invoice->branch->floor,
                $invoice->branch->room,
                $invoice->branch->landmark,
                $invoice->branch->address_additional_information,
            ),
        );
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\Receiver
     */
    private function getReceiver(InvoiceModel $invoice): DTO\Receiver
    {
        return new DTO\Receiver(
            $invoice->data('customer.id'),
            $invoice->data('customer.name'),
            $invoice->data('customer.type', 'B'),
            new DTO\Address(
                $invoice->data('customer.address.country'),
                $invoice->data('customer.address.regionCity'),
                $invoice->data('customer.address.governate'),
                $invoice->data('customer.address.street'),
                $invoice->data('customer.address.buildingNumber'),
                null,
                $invoice->data('customer.address.postalCode'),
                $invoice->data('customer.address.floor'),
                $invoice->data('customer.address.room'),
                $invoice->data('customer.address.landmark'),
                $invoice->data('customer.address.additionalInformation'),
            ),
        );
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\InvoiceLine[]
     */
    private function getInvoiceLines(InvoiceModel $invoice): array
    {
        return $invoice->invoiceLines->map(
            fn(InvoiceLine $model) => new DTO\InvoiceLine(
                $model->data('description'),
                $model->data('itemType'),
                $model->data('itemCode'),
                $model->data('unitType'),
                $model->data('quantity'),
                new DTO\Value(
                    $model->data('unitValue.currencySold'),
                    $model->data('unitValue.amountEGP'),
                    $model->data('unitValue.amountSold'),
                    $model->data('unitValue.currencyExchangeRate'),
                ),
                $model->data('salesTotal'),
                $model->data('total'),
                $model->data('valueDifference'),
                $model->data('totalTaxableFees'),
                $model->data('netTotal'),
                $model->data('itemsDiscount'),
                new DTO\Discount(
                    $model->data('discount.rate'),
                    $model->data('discount.amount'),
                ),
                array_map(static fn($tax) => new DTO\TaxableItem(
                    $tax['taxType'],
                    $tax['amount'],
                    $tax['subType'],
                    $tax['rate'],
                ), $model->data('taxableItems')),
                $model->data('internalCode'),
            )
        )->toArray();
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\Payment|null
     */
    private function getPayment(InvoiceModel $invoice): ?DTO\Payment
    {
        if (!$invoice->data->has('payment')) {
            return null;
        }

        return new DTO\Payment(
            $invoice->data('payment.bankName'),
            $invoice->data('payment.bankAddress'),
            $invoice->data('payment.bankAccountNo'),
            $invoice->data('payment.bankAccountIBAN'),
            $invoice->data('payment.swiftCode'),
            $invoice->data('payment.terms'),
        );
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\Delivery|null
     */
    private function getDelivery(InvoiceModel $invoice): ?DTO\Delivery
    {
        if (!$invoice->data->has('delivery')) {
            return null;
        }

        return new DTO\Delivery(
            $invoice->data('delivery.approach'),
            $invoice->data('delivery.packaging'),
            Carbon::parse($invoice->data('delivery.dateValidity'))->toDateTimeLocalString(),
            $invoice->data('delivery.exportPort'),
            $invoice->data('delivery.countryOfOrigin'),
            $invoice->data('delivery.grossWeight'),
            $invoice->data('delivery.netWeight'),
            $invoice->data('delivery.terms'),
        );
    }

    /**
     * @param InvoiceModel $invoice
     * @return DTO\TaxTotal[]
     */
    private function getTaxTotals(InvoiceModel $invoice): array
    {
        return array_map(
            static fn($amount) => new DTO\TaxTotal('CIT', $amount),
            $invoice->data('taxTotals')
        );
    }
}
