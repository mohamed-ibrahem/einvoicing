<?php

namespace App\Domains\ETA\DTO;

class Auth
{
    /**
     * @param  string|null  $token
     * @param  string|null  $tokenType
     * @param  int|null  $expires_in
     */
    public function __construct(
        public readonly ?string $token,
        public readonly ?string $tokenType,
        public readonly ?int $expires_in,
    ) {
        //
    }
}
