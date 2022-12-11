<?php

namespace App\Domains\Invoice\Jobs;

use App\Domains\ETA\APIs\Invoice as InvoiceAPI;
use App\Domains\ETA\DTO;
use App\Domains\Invoice\Models\Invoice as InvoiceModel;
use App\Domains\Invoice\Models\InvoiceLine;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use JsonException;

class SubmitInvoiceToETA implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public InvoiceModel $invoice,
    ) {
        //
    }

    public function handle(): void
    {
        try {
            app(InvoiceAPI::class)
                ->submit($this->getInvoice(), function (array $response) {
                    if (isset($response['rejectedDocuments']) && count($response['rejectedDocuments']) > 0) {
                        $rejectedDocument = $response['rejectedDocuments'][0];
                        $this->invoice->saveErrorResponse(
                            $rejectedDocument['error']['message'],
                            $rejectedDocument['error']
                        );

                        return;
                    }

                    $this->invoice->saveSuccessResponse($response);
                });
        } catch (Exception $e) {
            $this->invoice->saveErrorResponse($e->getMessage());
        }
    }

    /**
     * @return DTO\Invoice
     *
     * @throws JsonException
     */
    private function getInvoice(): DTO\Invoice
    {
        return new DTO\Invoice(
            $this->getIssuer($this->invoice),
            $this->getReceiver($this->invoice),
            $this->invoice->created_at->toDateTimeLocalString(),
            $this->invoice->branch->activity_code,
            $this->invoice->getData('id'),
            $this->invoice->getData('totalDiscountAmount'),
            $this->invoice->getData('totalSalesAmount'),
            $this->invoice->getData('netAmount'),
            $this->getTaxTotals($this->invoice),
            $this->invoice->getData('totalAmount'),
            $this->invoice->getData('extraDiscountAmount'),
            $this->invoice->getData('totalItemsDiscountAmount'),
            $this->getInvoiceLines($this->invoice),
            $this->invoice->getData('purchaseOrderReference'),
            $this->invoice->getData('purchaseOrderDescription'),
            $this->invoice->getData('salesOrderReference'),
            $this->invoice->getData('salesOrderDescription'),
            $this->invoice->getData('proformaInvoiceNumber'),
            $this->getPayment($this->invoice),
            $this->getDelivery($this->invoice),
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
    private function getTaxTotals(InvoiceModel $invoice): ?array
    {
        if (! $invoice->data->has('taxTotals')) {
            return null;
        }

        return array_map(
            static fn ($tax) => new DTO\TaxTotal($tax['taxType'], $tax['amount']),
            $invoice->getData('taxTotals', [])
        );
    }
}
