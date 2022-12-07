<?php

namespace App\Domains\Feeds\Filament\Actions;

use App\Domains\Feeds\Feed;
use Filament\Pages\Actions\Action;

class FeedInvoicesTable extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'feed';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(fn (): string => __('Feed with (:driver)', [
            'driver' => [
                'retail_pro' => 'RetailPro',
            ][Feed::getDefaultDriver()],
        ]));

        $this->button();

        $this->groupedIcon('heroicon-s-plus');

        $this->action(function (): void {
            Feed::run();

            $this->success();
        });
    }
}
