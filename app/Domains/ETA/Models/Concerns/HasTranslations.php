<?php

namespace App\Domains\ETA\Models\Concerns;

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

        $value = $this->getAttribute('desc_' . $locale);

        if (is_null($value)) {
            return $this->getAttribute('desc_en');
        }

        return $value;
    }
}
