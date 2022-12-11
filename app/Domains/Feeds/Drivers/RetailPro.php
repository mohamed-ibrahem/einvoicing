<?php

namespace App\Domains\Feeds\Drivers;

use App\Domains\Branch\Models\Branch;
use App\Domains\Invoice\Jobs\SubmitInvoiceToETA;
use App\Domains\Invoice\Models\Invoice;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class RetailPro extends Driver
{
    /**
     * Session id that generated from the retail pro.
     *
     * @var string|null
     */
    private ?string $auth_session = null;

    /**
     * {@inheritDoc}
     *
     * @return void
     *
     * @throws RequestException
     */
    public function run(): void
    {
        $this->login();

        $response = Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
            ->withHeaders([
                'Accept' => 'application/json',
                'Auth-Session' => $this->auth_session,
            ])
            ->get('/v1/rest/document', [
                'cols' => '*',
            ])
            ->throw()
            ->json();

        if (isset($response['errors'])) {
            throw new InvalidArgumentException($response['errors'][0]['errormsg'] ?? 'Fatal error');
        }

        foreach ($response as $invoice) {
            $this->create($invoice);
        }
    }

    /**
     * Create a new invoice.
     *
     * @param  array  $data
     * @return Invoice
     */
    public function create(array $data): Invoice
    {
        if (! is_null($invoice = Invoice::where('uuid', $data['sid'])->first())) {
            return $invoice;
        }

        $invoice = DB::transaction(function () use ($data): Invoice {
            $invoice = Invoice::create([
                'uuid' => $data['sid'],
                'branch_id' => Branch::where([
                    'sid' => $data['store_uid'],
                ])->value('id'),
                'data' => [
                    'id' => $data['sid'],
                    'totalDiscountAmount' => $data['total_discount_amt'],
                    'totalSalesAmount' => $data['sale_total_amt'],
                    'netAmount' => $data['sale_subtotal'],

                    'customer' => [
                        'id' => $data['bt_cuid'],
                        'name' => $data['bt_first_name'].' '.$data['bt_last_name'],
                        'type' => 'B',
                        'address' => [
                            'country' => $data['bt_country'] ?? 'EG',
                            'regionCity' => $data['bt_address_line2'] ?? 'Cairo',
                            'governate' => $data['bt_address_line1'] ?? 'Cairo',
                            'street' => $data['bt_address_line3'] ?? 'Not available',
                            'buildingNumber' => 0,
                            'postalCode' => $data['bt_postal_code'],
                            'floor' => 0,
                            'room' => 0,
                        ],
                    ],
                ],
            ]);

            $this->createInvoiceLine($invoice, $data['items']);

            return $invoice;
        });

        SubmitInvoiceToETA::dispatch($invoice);

        return $invoice;
    }

    /**
     * Create invoice line for the given invoice.
     *
     * @param  Invoice  $invoice
     * @param  array  $items
     * @return void
     */
    private function createInvoiceLine(Invoice $invoice, array $items): void
    {
        foreach ($items as $item) {
            $response = Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Auth-Session' => $this->auth_session,
                ])
                ->get($item['link'], [
                    'cols' => '*',
                ])
                ->json();

            $invoice->invoiceLines()->create([
                'uuid' => $response['sid'],
                'data' => [
                    'description' => $response['item_description1'].' '.$response['item_description2'],
                    'itemType' => $response['item_type'],
                    'itemCode' => 'GS1',
                    'unitType' => 'kg',
                    'quantity' => $item['quantity'],
                    'unitValue' => [
                        'currencySold' => 'EGP',
                        'amountEGP' => $response['price'],
                        'amountSold' => $response['price'],
                        'currencyExchangeRate' => 0,
                    ],
                    'salesTotal' => $response['price'],
                    'total' => $response['price'],
                    'valueDifference' => 0,
                    'totalTaxableFees' => $response['original_tax_amount'],
                    'netTotal' => $response['price'],
                    'itemsDiscount' => 0,
                ],
            ]);
        }
    }

    /**
     * Login the current user to the retail pro server.
     *
     * @return void
     */
    private function login(): void
    {
        $preAuth = Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))->get('/v1/rest/auth');

        $auth = Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
            ->withHeaders([
                'Accept' => 'application/json, text/plain, */*',
                'Auth-Nonce' => $preAuth->header('Auth-Nonce'),
                'Auth-Nonce-Response' => (((int) $preAuth->header('Auth-Nonce') / 13) % 99999) * 17,
            ])
            ->get('/v1/rest/auth', [
                'usr' => config('eta.drivers.retail_pro.username'),
                'pwd' => config('eta.drivers.retail_pro.password'),
            ]);

        $this->auth_session = $auth->header('Auth-Session');

        Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
            ->withHeaders([
                'Accept' => 'application/json, text/plain, */*',
                'Auth-Session' => $this->auth_session,
            ])
            ->get('/v1/rest/sit', [
                'ws' => 'webclient',
            ]);
    }
}
