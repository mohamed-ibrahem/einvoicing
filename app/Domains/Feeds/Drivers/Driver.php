<?php

namespace App\Domains\Feeds\Drivers;

use App\Domains\Invoice\Models\Invoice;
use Illuminate\Support\Collection;

abstract class Driver
{
    /**
     * Get all invoices from the adapter driver.
     *
     * @return Collection<Invoice>
     */
    abstract public function run(): Collection;

    /**
     * Create a new invoice.
     *
     * @param  array  $data
     * @return Invoice
     */
    abstract public function create(array $data): Invoice;
}
