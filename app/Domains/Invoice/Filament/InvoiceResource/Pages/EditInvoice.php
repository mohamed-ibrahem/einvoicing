<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Pages;

use App\Domains\Invoice\Filament\InvoiceResource;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
