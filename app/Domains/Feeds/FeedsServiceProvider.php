<?php

namespace App\Domains\Feeds;

use Illuminate\Support\ServiceProvider;

class FeedsServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            'feeder',
            fn ($app) => new FeedManager($app)
        );
    }
}
