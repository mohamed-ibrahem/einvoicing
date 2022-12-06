<?php

namespace App\Domains\Feeds\Drivers;

use App\Domains\Invoice\Jobs\SubmitInvoiceToETA;
use App\Domains\Invoice\Models\Invoice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RetailPro extends Driver
{
    /**
     * {@inheritDoc}
     *
     * @return Collection
     */
    public function run(): Collection
    {
        $this->login();

        return collect(
            Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
                ->get('/')
                ->json('data')
        )->tap(function ($invoices) {
            $invoices->each(fn ($invoice) => $this->create($invoice));
        });
    }

    /**
     * {@inheritDoc}
     *
     * @param  array  $data
     * @return Invoice
     */
    public function create(array $data): Invoice
    {
        $invoice = Invoice::create($data);

        SubmitInvoiceToETA::dispatch($invoice);

        return $invoice;
    }

    /**
     * Login the current user to the retail pro server.
     *
     * @return void
     */
    private function login(): void
    {
        Http::baseUrl(config('eta.drivers.retail_pro.baseURL'))
            ->get('auth', [
                'usr' => config('eta.drivers.retail_pro.username'),
                'pwd' => config('eta.drivers.retail_pro.password'),
            ]);
    }
}
