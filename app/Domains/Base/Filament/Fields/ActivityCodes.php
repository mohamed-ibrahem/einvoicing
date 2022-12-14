<?php

namespace App\Domains\Base\Filament\Fields;

use App\Domains\ETA\Models\ActivityCodes as ActivityCodesModel;
use Filament\Forms\Components\Select;

class ActivityCodes extends Select
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->searchable();

        $this->options(
            ActivityCodesModel::all()->pluck('description', 'code')
        );

        $this->getSearchResultsUsing(
            fn (string $search) => ActivityCodesModel::search($search)->limit(5)->get()->pluck('description', 'code')
        );

        $this->getOptionLabelUsing(
            fn ($value): ?string => ActivityCodesModel::where('code', $value)->first()?->description
        );
    }
}
