<?php

namespace App\Domains\Invoice;

use App\Domains\Invoice\Filament\InvoiceResource;
use Filament\PluginServiceProvider;

class InvoiceServiceProvider extends PluginServiceProvider
{
    public static string $name = 'invoice_domain';

    protected array $resources = [
        InvoiceResource::class,
    ];
}
