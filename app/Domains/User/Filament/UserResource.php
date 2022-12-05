<?php

namespace App\Domains\User\Filament;

use App\Domains\User\Filament\UserResource\Pages;
use App\Domains\User\Models\User;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),

                TextInput::make('email')
                    ->label(__('E-Mail Address'))
                    ->required(),

                Card::make()
                    ->schema([
                        TextInput::make('auth_password')
                            ->label(__('Your Current Password'))
                            ->password()
                            ->currentPassword()
                            ->required(fn (string $context): bool => $context === 'create'),

                        TextInput::make('password')
                            ->label(__('User Password'))
                            ->password()
                            ->reactive()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->requiredWith('auth_password'),

                        TextInput::make('password_confirmation')
                            ->label(__('Confirm User Password'))
                            ->password()
                            ->same('password')
                            ->requiredWith('auth_password'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),

                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label(__('E-Mail Address'))
                    ->searchable()
                    ->sortable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('User');
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('Users and Roles');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where(
            'users.current_branch_id',
            auth()->user()->current_branch_id
        );
    }

    protected static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['currentBranch']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'currentBranch.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->currentBranch) {
            $details['Branch'] = $record->currentBranch->name;
        }

        return $details;
    }
}
