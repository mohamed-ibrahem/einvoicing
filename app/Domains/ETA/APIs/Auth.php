<?php

namespace App\Domains\ETA\APIs;

use App\Domains\Branch\Models\Branch;
use App\Domains\ETA\DTO;
use App\Domains\ETA\Exceptions\BadRequestException;

class Auth extends Api
{
    /**
     * The base url of the ETA system apis.
     *
     * @var string
     */
    protected string $baseUrl = 'https://id.eta.gov.eg';

    /**
     * Login given client id and secret.
     *
     * @param Branch $branch
     * @return DTO\Auth
     * @throws BadRequestException
     */
    public function login(Branch $branch): DTO\Auth
    {
        $response = $this->asForm()
            ->post('/connect/token', [
                'grant_type' => 'client_credentials',
                'client_id' => $branch->client_id,
                'client_secret' => $branch->client_secret,
                'scope' => '',
            ]);

        return new DTO\Auth(
            $response['access_token'],
            $response['token_type'],
            $response['expires_in'],
            $response['scope'],
        );
    }
}
