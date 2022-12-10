<?php

namespace App\Domains\Feeds\Drivers;

use App\Domains\Branch\Models\Branch;
use App\Domains\Invoice\Models\Invoice;
use Illuminate\Http\Client\RequestException;
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
            ->get('/v1/rest/document')
            ->throw()
            ->json();

        if (count($response->get('errors', []))) {
            throw new InvalidArgumentException($response['errors'][0]['errormsg'] ?? 'Fatal error');
        }

        foreach ($response->get('data', []) as $invoice) {
            if ($invoice['status'] !== 4) {
                return;
            }

            $this->create($invoice);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @param  array  $data
     * @return Invoice
     */
    public function create(array $data): Invoice
    {
        $invoice = Invoice::create([
            'uuid' => $data['udf1string'],
            'branch_id' => Branch::where([
                'sid' => $data['storesid'],
            ])->value('id'),
            'data' => [
                'id' => $data['sid'],
                'totalDiscountAmount' => $data['totaldiscountamt'],
                'totalSalesAmount' => $data['saletotalamt'],
                'netAmount' => $data['salesubtotal'],

                'customer' => [
                    'id' => $data['btcuid'],
                    'name' => $data['btfirstname'].' '.$data['btlastname'],
                    'type' => 'B',
                    'address' => [
                        'country' => $data['btcountry'] ?? 'EG',
                        'regionCity' => $data['btaddressline2'],
                        'governate' => $data['btaddressline1'],
                        'street' => $data['btaddressline3'],
                        'buildingNumber' => 0,
                        'postalCode' => $data['btpostalcode'],
                        'floor' => 0,
                        'room' => 0,
                    ],
                ],
            ],
        ]);

        // Create invoice line.

//        SubmitInvoiceToETA::dispatch($invoice);

        return $invoice;
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
