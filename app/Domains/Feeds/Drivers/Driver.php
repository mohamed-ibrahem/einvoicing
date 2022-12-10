<?php

namespace App\Domains\Feeds\Drivers;

use App\Domains\Invoice\Models\Invoice;

abstract class Driver
{
    /**
     * Get all invoices from the adapter driver.
     *
     * @return void
     */
    abstract public function run(): void;

    /**
     * Create a new invoice.
     *
     * @param  array  $data
     * @return Invoice
     */
    abstract public function create(array $data): Invoice;
}
