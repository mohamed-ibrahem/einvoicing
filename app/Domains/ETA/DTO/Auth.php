<?php

namespace App\Domains\ETA\DTO;

class Auth
{
    /**
     * @param  string|null  $token Encoded JWT token structure that contains the fields of the issued token and also token protection attributes.
     * @param  string|null  $tokenType Solution in this case returns only Bearer authentication tokens.
     * @param  int|null  $expires_in The lifetime of the access token defined in seconds.
     * @param  string|null  $scope Optional if matches the requested scope. Otherwise contains information on scope granted to token. This defines the APIs that client will have access to using this token.
     */
    public function __construct(
        public readonly ?string $token,
        public readonly ?string $tokenType,
        public readonly ?int $expires_in,
        public readonly ?string $scope
    ) {
        //
    }
}
