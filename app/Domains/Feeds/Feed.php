<?php

namespace App\Domains\Feeds;

use App\Domains\Feeds\Drivers\Driver;
use Illuminate\Support\Facades\Facade;

/**
 * @extends Driver
 */
class Feed extends Facade
{
    /**
     * {@inheritDoc}
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'feeder';
    }
}
