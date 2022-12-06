<?php

namespace App\Domains\Feeds\Console;

use App\Domains\Feeds\Feed;
use Illuminate\Console\Command;

class FeedCommand extends Command
{
    protected $signature = 'feed';

    protected $description = 'Feed the invoices with the specified adapter.';

    public function handle(): int
    {
        Feed::run();

        return Command::SUCCESS;
    }
}
