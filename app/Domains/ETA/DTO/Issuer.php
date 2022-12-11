<?php

namespace App\Domains\ETA\DTO;

class Issuer
{
    /**
     * @param  string|null  $id
     * @param  string|null  $name
     * @param  string|null  $type
     * @param  Address|null  $address
     */
    public function __construct(
        public readonly ?string $id = '0',
        public readonly ?string $name = 'Unknown',
        public readonly ?string $type = 'B',
        public readonly ?Address $address = null,
    ) {
        //
    }
}
