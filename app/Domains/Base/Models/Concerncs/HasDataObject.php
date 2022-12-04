<?php

namespace App\Domains\Base\Models\Concerncs;

use Illuminate\Support\Arr;

trait HasDataObject
{
    /**
     * Get data from a Multidimensional Collection.
     *
     * @param  string  $key
     * @param  mixed|null  $default
     * @param  string  $column
     * @return mixed
     */
    public function data(string $key, mixed $default = null, string $column = 'data'): mixed
    {
        $this->mergeCasts([
            $column => 'collection',
        ]);

        return Arr::get($this->getAttribute($column), $key, $default);
    }
}
