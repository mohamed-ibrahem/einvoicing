<?php

namespace App\Domains\Feeds;

use Illuminate\Support\Manager;

class FeedManager extends Manager
{
    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getDefaultDriver(): string
    {
        return config('eta.invoices_adapter', 'retail_pro');
    }

    /**
     * Get an instance of Retail Pro Driver instance.
     *
     * @return Drivers\Driver
     */
    public function createRetailProDriver(): Drivers\Driver
    {
        return new Drivers\RetailPro();
    }
}
