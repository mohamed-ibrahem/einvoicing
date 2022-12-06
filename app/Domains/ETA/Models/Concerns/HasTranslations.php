<?php

namespace App\Domains\ETA\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait HasTranslations
{
    /**
     * Get description attribute.
     *
     * @return string|null
     */
    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();

        $value = $this->getAttribute('desc_'.$locale);

        if (is_null($value)) {
            return $this->getAttribute('desc_en');
        }

        return $value;
    }

    public function scopeSearch(Builder $query, string $term)
    {
        $query->where('code', 'LIKE', "%$term%")
            ->orWhere('desc_ar', 'LIKE', "%$term%")
            ->orWhere('desc_en', 'LIKE', "%$term%");
    }
}
