<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Actions;

use App\Domains\Invoice\Jobs\SubmitInvoiceToETA;
use App\Domains\Invoice\Models\Invoice;
use Filament\Support\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\Action;

class SubmitInvoiceAction extends Action
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'submit';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('Submit'));

        $this->requiresConfirmation();

        $this->color('secondary');

        $this->icon('heroicon-o-upload');

        $this->modalHeading(fn (): string => __('Submit invoice #:label', ['label' => $this->getRecordTitle()]));

        $this->modalActions(fn (): array => [
            $this->getModalCancelAction()->label(__('filament-support::actions/view.single.modal.actions.close.label')),
            $this->getModalSubmitAction()->label(__('Submit to ETA')),
        ]);

        $this->action(function () {
            $this->process(function (Invoice $record) {
                SubmitInvoiceToETA::dispatch($record);
            });

            $this->success();
        });
    }
}
