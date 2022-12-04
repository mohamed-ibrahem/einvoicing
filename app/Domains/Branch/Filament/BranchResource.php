<?php

namespace App\Domains\Branch\Filament;

use App\Domains\Branch\Filament\BranchResource\Pages;
use App\Domains\Branch\Models\Branch;
use App\Domains\ETA\Models\ActivityCodes;
use App\Domains\ETA\Models\CountryCodes;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
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
                    ->required(),

                Select::make('type')
                        ->required()
                    ->options([
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)'
                    ]),

                Select::make('activity_code')
                        ->required()
                    ->searchable()
                    ->relationship('activity_code_relation', 'code')
                    ->getSearchResultsUsing(fn(string $search) => ActivityCodes::search($search)->limit(5)->get()->pluck('description', 'id'))
                    ->getOptionLabelFromRecordUsing(fn(ActivityCodes $record): ?string => $record->description),

                Section::make('Address information')
                    ->collapsible()
                    ->schema([
                        Select::make('country')
                                ->required()
                            ->searchable()
                            ->relationship('country_relation', 'code')
                            ->getSearchResultsUsing(fn(string $search) => CountryCodes::search($search)->limit(5)->get()->pluck('description', 'id'))
                            ->getOptionLabelFromRecordUsing(fn(CountryCodes $record): ?string => $record->description),

                        TextInput::make('region_city')
                            ->required(),

                        TextInput::make('governate')
                            ->required(),

                        TextInput::make('street')
                            ->required(),

                        TextInput::make('building_number')
                            ->required(),

                        TextInput::make('postal_code'),

                        TextInput::make('floor'),

                        TextInput::make('room'),

                        TextInput::make('landmark'),

                        TextInput::make('address_additional_information'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->formatStateUsing(fn(Branch $record) => [
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)'
                    ][$record->type] ?? '-')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('activity_code_relation.description'),

                TextColumn::make('country_relation.description'),

                TextColumn::make('region_city')
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
