<?php

namespace App\Domains\Branch\Filament;

use App\Domains\Base\Filament\Fields\ActivityCodes;
use App\Domains\Base\Filament\Fields\Countries;
use App\Domains\Branch\Filament\BranchResource\Pages;
use App\Domains\Branch\Models\Branch;
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
                    ->translateLabel()
                    ->required(),

                Select::make('type')
                    ->translateLabel()
                    ->required()
                    ->options([
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)'
                    ]),

                ActivityCodes::make('activity_code')
                    ->translateLabel()
                    ->required(),

                Section::make('Address information')
                    ->collapsible()
                    ->schema([
                        Countries::make('country')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('region_city')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('governate')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('street')
                            ->translateLabel()
                            ->required(),

                        TextInput::make('building_number')
                            ->translateLabel()
                            ->maxLength(10)
                            ->required(),

                        TextInput::make('postal_code')
                            ->translateLabel()
                            ->nullable()
                            ->maxLength(10),

                        TextInput::make('floor')
                            ->translateLabel()
                            ->nullable()
                            ->maxLength(10),

                        TextInput::make('room')
                            ->translateLabel()
                            ->nullable()
                            ->maxLength(10),

                        TextInput::make('landmark')
                            ->translateLabel()
                            ->nullable()
                            ->maxLength(10),

                        Textarea::make('address_additional_information')
                            ->translateLabel()
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->bulkActions([])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->columns([
                TextColumn::make('name')
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->translateLabel()
                    ->formatStateUsing(fn(Branch $record) => [
                        'B' => 'Business in Egypt (B)',
                        'P' => 'Natural person (P)',
                        'F' => 'Foreigner (F)'
                    ][$record->type] ?? '-')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('activity_code_relation.description')
                    ->translateLabel(),

                TextColumn::make('country_relation.description')
                    ->translateLabel(),

                TextColumn::make('region_city')
                    ->translateLabel()
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
