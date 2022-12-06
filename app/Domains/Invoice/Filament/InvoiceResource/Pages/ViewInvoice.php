<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Pages;

use App\Domains\Invoice\Filament\InvoiceResource;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;
}
