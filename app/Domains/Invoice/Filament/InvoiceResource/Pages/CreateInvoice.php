<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Pages;

use App\Domains\Invoice\Filament\InvoiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;
}
