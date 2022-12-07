<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Actions;

use App\Domains\Invoice\Jobs\SubmitInvoiceToETA;
use App\Domains\Invoice\Models\Invoice;
use Filament\Tables\Actions\Action;

class SubmitInvoiceAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'submit';
    }

    protected function setUp(): void
    {
        parent::setUp();

        /** @var Invoice $model */
        $model = $this->record;

        $this->visible(auth()->user()?->can('update', $model));

        $this->label(__('Submit'));

        $this->requiresConfirmation();

        $this->color('secondary');

        $this->icon('heroicon-o-upload');

        $this->modalHeading(fn (): string => __('Submit invoice #:label', ['label' => $model->getData('id')]));

        $this->modalActions(fn (): array => [
            $this->getModalCancelAction()->label(__('filament-support::actions/view.single.modal.actions.close.label')),
            $this->getModalSubmitAction()->label(__('Submit to ETA')),
        ]);

        $this->action(fn () => SubmitInvoiceToETA::dispatch($model));
    }
}
