<?php

namespace App\Domains\Base\Filament\Fields;

use App\Domains\ETA\Models\CountryCodes;
use Filament\Forms\Components\Select;

class Countries extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->searchable();

        $this->getSearchResultsUsing(
            fn (string $search) => CountryCodes::search($search)->limit(5)->get()->pluck('description', 'code')
        );

        $this->getOptionLabelUsing(
            fn ($value): ?string => CountryCodes::where('code', $value)->first()?->description
        );
    }
}
