<?php

namespace App\Domains\Branch\Filament;

use App\Domains\Base\Filament\Fields\ActivityCodes;
use App\Domains\Base\Filament\Fields\Address;
use App\Domains\Branch\Filament\BranchResource\Pages;
use App\Domains\Branch\Models\Branch;
use Exception;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $slug = 'branches';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__())
                    ->required(),

                Select::make('type')
                    ->label(__())
                    ->required()
                    ->options([
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)',
                    ]),

                ActivityCodes::make('activity_code')
                    ->label(__())
                    ->required(),

                Section::make('Address information')
                    ->collapsible()
                    ->schema(Address::make([
                        'country' => [
                            'attribute' => 'country',
                            'nullable' => false,
                        ],
                        [
                            'attribute' => 'region_city',
                            'nullable' => false,
                        ],
                        [
                            'attribute' => 'governate',
                            'nullable' => false,
                        ],
                        [
                            'attribute' => 'street',
                            'nullable' => false,
                        ],
                        [
                            'attribute' => 'building_number',
                            'nullable' => false,
                            'maxLength' => 10,
                        ],
                        [
                            'attribute' => 'postal_code',
                            'nullable' => true,
                            'maxLength' => 10,
                        ],
                        [
                            'attribute' => 'floor',
                            'nullable' => true,
                            'maxLength' => 10,
                        ],
                        [
                            'attribute' => 'room',
                            'nullable' => true,
                            'maxLength' => 10,
                        ],
                        [
                            'attribute' => 'landmark',
                            'nullable' => true,
                            'maxLength' => 10,
                        ],
                        'additional_information' => [
                            'attribute' => 'address_additional_information',
                            'nullable' => true,
                        ],
                    ])),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->bulkActions([])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->columns([
                TextColumn::make('name')
                    ->label(__())
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__())
                    ->formatStateUsing(fn (Branch $record) => [
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)',
                    ][$record->type] ?? '-')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('activity_code_relation.description')
                    ->label(__()),

                TextColumn::make('country_relation.description')
                    ->label(__()),

                TextColumn::make('region_city')
                    ->label(__())
                    ->searchable(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereRelation('users', 'users.id', auth()->id());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'view' => Pages\ViewBranch::route('/{record}'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'country', 'region_city'];
    }

    public static function getModelLabel(): string
    {
        return __('Branch');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('ERP');
    }
}
