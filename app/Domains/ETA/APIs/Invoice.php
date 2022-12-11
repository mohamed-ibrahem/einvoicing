<?php

namespace App\Domains\ETA\APIs;

use App\Domains\ETA\DTO;
use App\Domains\ETA\Exceptions\BadRequestException;
use Closure;
use JsonException;

class Invoice extends Api
{
    /**
     * @param  DTO\Invoice  $invoice
     * @param  Closure  $callback
     * @return void
     *
     * @throws BadRequestException
     * @throws JsonException
     */
    public function submit(DTO\Invoice $invoice, Closure $callback): void
    {
        $auth = app(Auth::class)->login();

        $response = $this->asJson()
            ->withToken($auth->token, $auth->tokenType)
            ->post('/documentsubmissions', [
                'documents' => [
                    $invoice->toArray(),
                ],
            ]);

        $callback($response);
    }
}
