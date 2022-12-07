<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Pages;

use App\Domains\Feeds\Filament\Actions\FeedInvoicesTable;
use App\Domains\Invoice\Filament\InvoiceResource;
use Filament\Pages\Actions\ActionGroup;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
            ActionGroup::make([
                FeedInvoicesTable::make(),
            ]),
        ];
    }
}
