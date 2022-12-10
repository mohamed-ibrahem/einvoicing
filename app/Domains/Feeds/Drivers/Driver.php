<?php

namespace App\Domains\Feeds\Drivers;

abstract class Driver
{
    /**
     * Get all invoices from the adapter driver.
     *
     * @return void
     */
    abstract public function run(): void;
}
