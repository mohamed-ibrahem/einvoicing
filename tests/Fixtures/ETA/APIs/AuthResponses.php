<?php

namespace Tests\Fixtures\ETA\APIs;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Http;

class AuthResponses
{
    /**
     * Mock the ETA success login response.
     *
     * @return PromiseInterface
     */
    public static function successResponse(): PromiseInterface
    {
        return Http::response([
            'access_token' => 'token',
            'expires_in' => 600,
            'token_type' => 'Bearer',
            'scope' => 'InvoicingAPI',
        ]);
    }

    /**
     * Mock the ETA failed exception.
     *
     * @param  string  $error
     * @return PromiseInterface
     */
    public static function failedWithError(string $error): PromiseInterface
    {
        return Http::response([
            'error' => $error,
        ], 400);
    }
}
