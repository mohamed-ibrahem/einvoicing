<?php

namespace App\Domains\Base\Filament\Fields;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class Address
{
    /**
     * Generate list of address fields.
     *
     * @param  array  $fields
     * @return array
     */
    public static function make(array $fields = []): array
    {
        $generatedFields = [];

        foreach ($fields as $field => $data) {
            $generatedFields[] = match ($field) {
                'country' => Countries::make($data['attribute'])
                    ->label(__('Country'))
                    ->nullable($data['nullable'] ?? false),
                'additional_information' => Textarea::make($data['attribute'])
                    ->label(__('Additional Information'))
                    ->nullable($data['nullable']),
                default => TextInput::make($data['attribute'])
                    ->label(__((string) Str::of($data['attribute'])->afterLast('.')->snake()->replace('_', ' ')->title()))
                    ->maxLength($data['maxLength'] ?? 255)
                    ->nullable($data['nullable'])
            };
        }

        return $generatedFields;
    }
}
