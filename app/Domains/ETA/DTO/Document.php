<?php

namespace App\Domains\ETA\DTO;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonException;

abstract class Document implements Arrayable, Jsonable
{
    /**
     * Structure containing one or two digital signatures. At least signature of the Issuer must be present. Signature of the Service provider is optional.
     *
     * @var Signature[]
     */
    public ?array $signatures = null;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        $this->signatures = [
            [
                'signatureType' => 'I',
                'value' => Signature::serialize($this->toArray()),
            ],
        ];
    }

    /**
     * Get the document as array.
     *
     * @return array
     *
     * @throws JsonException
     */
    public function toArray(): array
    {
        return array_filter($this->toJson());
    }

    /**
     * Get the document as json array.
     *
     * @param  int  $options
     * @return array
     *
     * @throws JsonException
     */
    public function toJson($options = 0): array
    {
        return json_decode(json_encode($this, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
    }
}
