<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Actions;

use App\Domains\ETA\APIs\Invoice;
use App\Domains\Invoice\Models\Invoice as InvoiceModel;
use Filament\Forms\ComponentContainer;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class SubmitInvoice extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-support::actions/view.single.label'));

        $this->requiresConfirmation();

        $this->color('secondary');

        $this->icon('heroicon-s-eye');

        $this->action(static function (InvoiceModel $invoice): void {
            app(Invoice::class)->submit($invoice);
        });
    }
}
