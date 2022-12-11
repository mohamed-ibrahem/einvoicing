<?php

namespace App\Domains\ETA\APIs;

use App\Domains\ETA\DTO;
use App\Domains\ETA\Exceptions\BadRequestException;
use Closure;
use JsonException;

class Receipt extends Api
{
    /**
     * @param  DTO\Receipt  $receipt
     * @param  Closure  $callback
     * @return void
     *
     * @throws BadRequestException
     * @throws JsonException
     */
    public function submit(DTO\Receipt $receipt, Closure $callback): void
    {
        $auth = app(Auth::class)->login();

        $response = $this->asJson()
            ->withToken($auth->token, $auth->tokenType)
            ->post('/receiptsubmissions', [
                'receipts' => [
                    $receipt->toArray(),
                ],
            ]);

        $callback($response);
    }
}
