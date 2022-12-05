<?php

namespace App\Domains\Invoice\Filament\InvoiceResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class InvoiceLinesRelationManager extends RelationManager
{
    protected static string $relationship = 'invoiceLines';

    protected static ?string $recordTitleAttribute = 'data->description';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('data.description')
                    ->label(__('Description'))
                    ->searchable(['data->description']),

                TextColumn::make('data.itemType')
                    ->label(__('Type')),

                TextColumn::make('data.itemCode')
                    ->label(__('Code'))
                    ->searchable(['data->itemCode']),

                TextColumn::make('data.quantity')
                    ->label(__('Quantity'))
                    ->searchable(['data->quantity'])
                    ->sortable(['data->quantity']),
            ]);
    }
}
