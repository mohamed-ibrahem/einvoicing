<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\Pages;

use App\Domains\Invoice\Filament\InvoiceResource;
use App\Domains\Invoice\Models\Invoice;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('tabs')
                ->tabs([
                    Tabs\Tab::make('Details')
                        ->translateLabel()
                        ->schema(parent::getFormSchema()),

                    Tabs\Tab::make('ETA Status')
                        ->translateLabel()
                        ->schema([
                            Placeholder::make('response.status')
                                ->label(__('Latest response status'))
                                ->content(fn (Invoice $record) => $record->getData('status', false, 'response') ? 'Successfully Send' : 'Failed to Send'),

                            Repeater::make('response.payload')
                                ->itemLabel(fn (array $state): ?string => $state['type'].': '.$state['error'])
                                ->label(__('Response details'))
                                ->collapsible()
                                ->schema([
                                    TextInput::make('type')
                                        ->label(__('Response type')),

                                    Textarea::make('error')
                                        ->label(__('Error Message')),

                                    Repeater::make('data.details')
                                        ->columns()
                                        ->label(__('Response details'))
                                        ->schema([
                                            TextInput::make('message')
                                                ->columnSpanFull()
                                                ->label(__('Message')),

                                            TextInput::make('target')
                                                ->label(__('Target')),

                                            TextInput::make('propertyPath')
                                                ->label(__('Path')),
                                        ]),
                                ]),
                        ]),
                ]),
        ];
    }
}
