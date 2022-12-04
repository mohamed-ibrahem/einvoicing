<?php

namespace Tests\Fixtures\ETA\APIs;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Support\Facades\Http;

class InvoiceResponses
{
    public static function validationResponse(): PromiseInterface
    {
        return Http::response([
            'submissionId' => null,
            'acceptedDocuments' => [],
            'rejectedDocuments' => [
                [
                    'internalId' => '4c3846d0-1887-3a57-a6ec-c1a415ec5093',
                    'error' => [
                        'code' => '2',
                        'message' => 'Validation Error',
                        'target' => '4c3846d0-1887-3a57-a6ec-c1a415ec5093',
                        'propertyPath' => null,
                        'details' => [
                            [
                                'code' => null,
                                'message' => 'ArrayItemNotValid',
                                'target' => '[0]',
                                'propertyPath' => '#/invoiceLines[0]',
                                'details' => null,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
