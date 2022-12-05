<?php

namespace App\Domains\Invoice\Filament;

use App\Domains\Base\Filament\Fields\Countries;
use App\Domains\Base\Filament\Fields\TaxTypes;
use App\Domains\Invoice\Filament\InvoiceResource\Actions\SubmitInvoiceAction;
use App\Domains\Invoice\Filament\InvoiceResource\Pages;
use App\Domains\Invoice\Filament\InvoiceResource\RelationManagers\InvoiceLinesRelationManager;
use App\Domains\Invoice\Models\Invoice;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $slug = 'invoices';

    protected static ?string $navigationIcon = 'heroicon-o-table';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('data.id')
                    ->label(__('Internal ID'))
                    ->required(),

                TextInput::make('data.proformaInvoiceNumber')
                    ->label(__('Proforma Invoice Number'))
                    ->helperText(__('Reference to the previous proforma invoice'))
                    ->nullable(),

                Grid::make(1)
                    ->schema([
                        TextInput::make('data.purchaseOrderReference')
                            ->label(__('Purchase Order Reference'))
                            ->helperText(__('Reference to purchase order that this document is related to'))
                            ->nullable(),

                        Textarea::make('data.purchaseOrderDescription')
                            ->label(__('Purchase Order Description'))
                            ->helperText(__('Additional information about the purchase order provided to the recipient of the document'))
                            ->nullable(),
                    ]),

                Grid::make(1)
                    ->schema([
                        TextInput::make('data.salesOrderReference')
                            ->label(__('Sales Order Reference'))
                            ->helperText(__('Reference to the previous sales order for informational purposes'))
                            ->nullable(),

                        Textarea::make('data.salesOrderDescription')
                            ->label(__('Sales Order Description'))
                            ->helperText(__('Additional information about the sales order provided to the recipient of the document'))
                            ->nullable(),
                    ]),

                Section::make('Invoice amount details')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.totalSalesAmount')
                            ->label(__('Total Sales Amount'))
                            ->helperText(__('Sum all InvoiceLine/SalesTotal items'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.totalDiscountAmount')
                            ->label(__('Total Discount Amount'))
                            ->helperText(__('Total amount of discounts: sum of all Discount amount elements of InvoiceLine items'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.netAmount')
                            ->label(__('Net Amount'))
                            ->helperText(__('Total Sales Amount – Total Discount Amount'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.extraDiscountAmount')
                            ->label(__('Extra Discount Amount'))
                            ->helperText(__('Additional discount amount applied at the level of the overall document, not individual lines'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),

                        TextInput::make('data.totalItemsDiscountAmount')
                            ->label(__('Total Items Discount Amount'))
                            ->helperText(__('Total amount of item discounts: sum of all Item Discount amount elements of InvoiceLine items'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),

                        Repeater::make('data.taxTotals')
                            ->label(__('Totals per tax type'))
                            ->minItems(1)
                            ->schema([
                                TaxTypes::make('taxType')
                                    ->label(__('Tax Type'))
                                    ->helperText(__('The TaxType needs to be unique across the invoice line (no VAT twice in one invoice line), TaxType is from the list of supported tax types.'))
                                    ->required(),

                                TextInput::make('amount')
                                    ->label(__('Amount'))
                                    ->helperText(__('Sum of all amounts of given tax in all invoice lines'))
                                    ->suffix('ج.م')
                                    ->numeric()
                                    ->required(),
                            ]),

                        TextInput::make('data.totalAmount')
                            ->label(__('Total Amount'))
                            ->helperText(__('Total amount of the invoice calculated as Net Amount + Totals of Tax Amounts'))
                            ->suffix('ج.م')
                            ->numeric()
                            ->required(),
                    ]),

                Section::make('Customer')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.customer.id')
                            ->label(__('Customer ID'))
                            ->helperText(__('Registration number. For business in Egypt must be registration number'))
                            ->required(),

                        TextInput::make('data.customer.name')
                            ->label(__('Customer Name'))
                            ->required(),

                        Select::make('data.customer.type')
                            ->label(__('Customer Account Type'))
                            ->required()
                            ->options([
                                'B' => 'Business in Egypt (B)',
                                'P' => 'Natural person (P)',
                                'F' => 'Foreigner (F)'
                            ]),

                        Section::make('Address information')
                            ->collapsible()
                            ->schema([
                                Countries::make('data.customer.address.country')
                                    ->label(__('Country'))
                                    ->nullable(),

                                TextInput::make('data.customer.address.regionCity')
                                    ->label(__('Region City'))
                                    ->nullable(),

                                TextInput::make('data.customer.address.governate')
                                    ->label(__('Governate'))
                                    ->nullable(),

                                TextInput::make('data.customer.address.street')
                                    ->label(__('Street'))
                                    ->nullable(),

                                TextInput::make('data.customer.address.buildingNumber')
                                    ->label(__('Building Number'))
                                    ->nullable(),

                                TextInput::make('data.customer.address.postalCode')
                                    ->nullable()
                                    ->label(__('Postal Code')),

                                TextInput::make('data.customer.address.floor')
                                    ->nullable()
                                    ->label(__('Floor')),

                                TextInput::make('data.customer.address.room')
                                    ->nullable()
                                    ->label(__('Room')),

                                TextInput::make('data.customer.address.landmark')
                                    ->nullable()
                                    ->label(__('Landmark')),

                                Textarea::make('data.customer.address.additionalInformation')
                                    ->nullable()
                                    ->label(__('Additional Information')),
                            ]),
                    ]),

                Section::make('Payment')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.payment.bankName')
                            ->nullable()
                            ->label(__('Bank Name')),

                        TextInput::make('data.payment.bankAddress')
                            ->nullable()
                            ->label(__('Bank Address')),

                        TextInput::make('data.payment.bankAccountNo')
                            ->nullable()
                            ->label(__('Bank Account No.')),

                        TextInput::make('data.payment.bankAccountIBAN')
                            ->nullable()
                            ->label(__('Bank Account IBAN')),

                        TextInput::make('data.payment.swiftCode')
                            ->nullable()
                            ->label(__('Swift Code')),

                        Textarea::make('data.payment.terms')
                            ->nullable()
                            ->label(__('Terms')),
                    ]),

                Section::make('Delivery')
                    ->collapsible()
                    ->schema([
                        TextInput::make('data.delivery.approach')
                            ->nullable()
                            ->label(__('Approach')),

                        TextInput::make('data.delivery.packaging')
                            ->nullable()
                            ->label(__('Packaging')),

                        DateTimePicker::make('data.delivery.dateValidity')
                            ->nullable()
                            ->label(__('Date Validity')),

                        TextInput::make('data.delivery.exportPort')
                            ->nullable()
                            ->label(__('Export Port')),

                        Countries::make('data.delivery.countryOfOrigin')
                            ->label(__('Delivery Country'))
                            ->nullable(),

                        TextInput::make('data.delivery.grossWeight')
                            ->nullable()
                            ->label(__('Gross Weight')),

                        TextInput::make('data.delivery.netWeight')
                            ->nullable()
                            ->label(__('Net Weight')),

                        Textarea::make('data.delivery.terms')
                            ->nullable()
                            ->label(__('Terms')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->bulkActions([])
            ->actions([
                SubmitInvoiceAction::make(),
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->poll()
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
                    ->money('EGP', true)
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
            'view' => Pages\ViewInvoice::route('/{record}'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }

    public static function getModelLabel(): string
    {
        return __('Invoice');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('ERP');
    }
}
