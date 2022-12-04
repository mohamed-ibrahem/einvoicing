<?php

namespace App\Domains\ETA\APIs;

use App\Domains\ETA\DTO;
use App\Domains\ETA\Exceptions\BadRequestException;
use App\Domains\Invoice\Models\Invoice as InvoiceModel;
use App\Domains\Invoice\Models\InvoiceLine;
use Illuminate\Support\Carbon;

class Invoice extends Api
{
    /**
     * @param  InvoiceModel  $invoice
     * @return void
     *
     * @throws BadRequestException
     */
    public function submit(InvoiceModel $invoice): void
    {
        $auth = app(Auth::class)->login();

        $document = $this->getInvoice($invoice);

        $response = $this->asJson()
            ->withToken($auth->token, $auth->tokenType)
            ->post('/documentsubmissions', [
                'documents' => [
                    $document,
                ],
            ]);

        dd($response);
    }

    /**
     * @param  InvoiceModel  $invoice
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
            $invoice->getData('totalDiscountAmount'),
            $invoice->getData('totalSalesAmount'),
            $invoice->getData('netAmount'),
            $this->getTaxTotals($invoice),
            $invoice->getData('totalAmount'),
            $invoice->getData('extraDiscountAmount'),
            $invoice->getData('totalItemsDiscountAmount'),
            $this->getInvoiceLines($invoice),
            $invoice->getData('purchaseOrderReference'),
            $invoice->getData('purchaseOrderDescription'),
            $invoice->getData('salesOrderReference'),
            $invoice->getData('salesOrderDescription'),
            $invoice->getData('proformaInvoiceNumber'),
            $this->getPayment($invoice),
            $this->getDelivery($invoice),
        );
    }

    /**
     * @param  InvoiceModel  $invoice
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
     * @param  InvoiceModel  $invoice
     * @return DTO\Receiver
     */
    private function getReceiver(InvoiceModel $invoice): DTO\Receiver
    {
        return new DTO\Receiver(
            $invoice->getData('customer.id'),
            $invoice->getData('customer.name'),
            $invoice->getData('customer.type', 'B'),
            new DTO\Address(
                $invoice->getData('customer.address.country'),
                $invoice->getData('customer.address.regionCity'),
                $invoice->getData('customer.address.governate'),
                $invoice->getData('customer.address.street'),
                $invoice->getData('customer.address.buildingNumber'),
                null,
                $invoice->getData('customer.address.postalCode'),
                $invoice->getData('customer.address.floor'),
                $invoice->getData('customer.address.room'),
                $invoice->getData('customer.address.landmark'),
                $invoice->getData('customer.address.additionalInformation'),
            ),
        );
    }

    /**
     * @param  InvoiceModel  $invoice
     * @return DTO\InvoiceLine[]
     */
    private function getInvoiceLines(InvoiceModel $invoice): array
    {
        return $invoice->invoiceLines->map(
            fn (InvoiceLine $model) => new DTO\InvoiceLine(
                $model->getData('description'),
                $model->getData('itemType'),
                $model->getData('itemCode'),
                $model->getData('unitType'),
                $model->getData('quantity'),
                new DTO\Value(
                    $model->getData('unitValue.currencySold'),
                    $model->getData('unitValue.amountEGP'),
                    $model->getData('unitValue.amountSold'),
                    $model->getData('unitValue.currencyExchangeRate'),
                ),
                $model->getData('salesTotal'),
                $model->getData('total'),
                $model->getData('valueDifference'),
                $model->getData('totalTaxableFees'),
                $model->getData('netTotal'),
                $model->getData('itemsDiscount'),
                new DTO\Discount(
                    $model->getData('discount.rate'),
                    $model->getData('discount.amount'),
                ),
                array_map(static fn ($tax) => new DTO\TaxableItem(
                    $tax['taxType'],
                    $tax['amount'],
                    $tax['subType'],
                    $tax['rate'],
                ), $model->getData('taxableItems')),
                $model->getData('internalCode'),
            )
        )->toArray();
    }

    /**
     * @param  InvoiceModel  $invoice
     * @return DTO\Payment|null
     */
    private function getPayment(InvoiceModel $invoice): ?DTO\Payment
    {
        if (! $invoice->data->has('payment')) {
            return null;
        }

        return new DTO\Payment(
            $invoice->getData('payment.bankName'),
            $invoice->getData('payment.bankAddress'),
            $invoice->getData('payment.bankAccountNo'),
            $invoice->getData('payment.bankAccountIBAN'),
            $invoice->getData('payment.swiftCode'),
            $invoice->getData('payment.terms'),
        );
    }

    /**
     * @param  InvoiceModel  $invoice
     * @return DTO\Delivery|null
     */
    private function getDelivery(InvoiceModel $invoice): ?DTO\Delivery
    {
        if (! $invoice->data->has('delivery')) {
            return null;
        }

        return new DTO\Delivery(
            $invoice->getData('delivery.approach'),
            $invoice->getData('delivery.packaging'),
            Carbon::parse($invoice->getData('delivery.dateValidity'))->toDateTimeLocalString(),
            $invoice->getData('delivery.exportPort'),
            $invoice->getData('delivery.countryOfOrigin'),
            $invoice->getData('delivery.grossWeight'),
            $invoice->getData('delivery.netWeight'),
            $invoice->getData('delivery.terms'),
        );
    }

    /**
     * @param  InvoiceModel  $invoice
     * @return DTO\TaxTotal[]
     */
    private function getTaxTotals(InvoiceModel $invoice): array
    {
        return array_map(
            static fn ($amount) => new DTO\TaxTotal('CIT', $amount),
            $invoice->getData('taxTotals')
        );
    }
}
