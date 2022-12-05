<?php

namespace App\Domains\Base\Filament\Fields;

use App\Domains\ETA\Models\CountryCodes;
use App\Domains\ETA\Models\TaxTypes as TaxTypesModel;
use Filament\Forms\Components\Select;

class TaxTypes extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->searchable();

        $this->options(
            TaxTypesModel::all()->pluck('description', 'code')
        );

        $this->getSearchResultsUsing(
            fn(string $search) => TaxTypesModel::search($search)->limit(5)->get()->pluck('description', 'code')
        );

        $this->getOptionLabelUsing(
            fn($value): ?string => TaxTypesModel::where('code', $value)->first()?->description
        );
    }
}
