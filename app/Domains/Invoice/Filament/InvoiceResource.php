<?php

namespace App\Domains\Invoice\Filament;

use App\Domains\ETA\Models\CountryCodes;
use App\Domains\ETA\Models\TaxTypes;
use App\Domains\Invoice\Filament\InvoiceResource\Pages;
use App\Domains\Invoice\Filament\InvoiceResource\RelationManagers\InvoiceLinesRelationManager;
use App\Domains\Invoice\Models\Invoice;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $slug = 'invoices';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('data.id')
                    ->required(),

                TextInput::make('data.purchaseOrderReference')
                    ->required(),

                TextInput::make('data.purchaseOrderDescription')
                    ->required(),

                TextInput::make('data.salesOrderReference')
                    ->required(),

                TextInput::make('data.salesOrderDescription')
                    ->required(),

                TextInput::make('data.proformaInvoiceNumber')
                    ->required(),

                Section::make('Total and Taxes')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.totalSalesAmount')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.totalDiscountAmount')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.netAmount')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.extraDiscountAmount')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.totalItemsDiscountAmount')
                            ->numeric()
                            ->required(),

                        Repeater::make('data.taxTotals')
                            ->minItems(1)
                            ->schema([
                                Select::make('taxType')
                                    ->options(TaxTypes::get()->pluck('description', 'id'))
                                    ->searchable()
                                    ->required(),

                                TextInput::make('amount')
                                    ->numeric()
                                    ->required(),
                            ]),

                        TextInput::make('data.totalAmount')
                            ->numeric()
                            ->required(),
                    ]),

                Section::make('Customer')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.customer.id')
                            ->required(),

                        TextInput::make('data.customer.name')
                            ->required(),

                        Select::make('data.customer.type')
                            ->required()
                            ->options([
                                'B' => 'Business in Egypt (B)',
                                'P' => 'Natural person (P)',
                                'F' => 'Foreigner (F)'
                            ]),

                        Section::make('Address information')
                            ->collapsible()
                            ->schema([
                                Select::make('data.customer.address.country')
                                    ->required()
                                    ->searchable()
                                    ->relationship('customer_country', 'code')
                                    ->getSearchResultsUsing(fn(string $search) => CountryCodes::search($search)->limit(5)->get()->pluck('description', 'id'))
                                    ->getOptionLabelFromRecordUsing(fn(CountryCodes $record): ?string => $record->description),

                                TextInput::make('data.customer.address.regionCity')
                                    ->required(),

                                TextInput::make('data.customer.address.governate')
                                    ->required(),

                                TextInput::make('data.customer.address.street')
                                    ->required(),

                                TextInput::make('data.customer.address.buildingNumber')
                                    ->required(),

                                TextInput::make('data.customer.address.postalCode'),

                                TextInput::make('data.customer.address.floor'),

                                TextInput::make('data.customer.address.room'),

                                TextInput::make('data.customer.address.landmark'),

                                TextInput::make('data.customer.address.additionalInformation'),
                            ]),
                    ]),

                Section::make('Payment')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.payment.bankName'),

                        TextInput::make('data.payment.bankAddress'),

                        TextInput::make('data.payment.bankAccountNo'),

                        TextInput::make('data.payment.bankAccountIBAN'),

                        TextInput::make('data.payment.swiftCode'),

                        Textarea::make('data.payment.terms'),

                    ]),

                Section::make('Delivery')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.delivery.approach'),

                        TextInput::make('data.delivery.packaging'),

                        DateTimePicker::make('data.delivery.dateValidity'),

                        TextInput::make('data.delivery.exportPort'),

                        Select::make('data.delivery.countryOfOrigin')
                            ->label(__('Delivery Country'))
                            ->searchable()
                            ->relationship('delivery_country', 'code')
                            ->getSearchResultsUsing(fn(string $search) => CountryCodes::search($search)->limit(5)->get()->pluck('description', 'id'))
                            ->getOptionLabelFromRecordUsing(fn(CountryCodes $record): ?string => $record->description),

                        TextInput::make('data.delivery.grossWeight'),

                        TextInput::make('data.delivery.netWeight'),

                        Textarea::make('data.delivery.terms'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('data.id')
                    ->label('#')
                    ->sortable(['data->id']),

                TextColumn::make('branch.name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('data.customer.name')
                    ->sortable(['data->customer->name']),

                TextColumn::make('data.totalAmount')
                    ->label(__('Total Amount'))
                    ->money('EGP')
                    ->sortable(['data->totalAmount']),

                IconColumn::make('response.status')
                    ->default(false)
                    ->label(__('Status'))
                    ->boolean(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            InvoiceLinesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
