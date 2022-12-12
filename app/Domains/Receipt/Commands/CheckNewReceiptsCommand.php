<?php

namespace App\Domains\Receipt\Commands;

use Illuminate\Console\Command;

class CheckNewReceiptsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:new-receipts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for new receipts.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        return Command::SUCCESS;
    }
}
