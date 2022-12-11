<?php

namespace ETA\APIs;

use App\Domains\ETA\APIs\Invoice;
use App\Domains\ETA\APIs\Receipt;
use App\Domains\ETA\DTO;
use Exception;
use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ETA\APIs\AuthResponses;
use Tests\Fixtures\ETA\APIs\InvoiceResponses;
use Tests\TestCase;

/** @see Invoice */
class ReceiptTest extends TestCase
{
    /** @test */
    public function it_can_submit_an_receipt(): void
    {
        Http::fake([
            '/connect/token' => fn () => AuthResponses::successResponse(),
        ]);

        $receipt = new DTO\Receipt(
            new DTO\Header(
                '2022-12-05T14:13:39.000Z',
                '0_654758419102957282',
                '89F8875315D17E52E1EDE0FCC59C0FD340439B0E30B2F8C51371490EF8D44A70',
                '805694257AB0D364AEC99F4953343FF48E6D9192E3C4B0F068177BD4049CEDAF',
                'EGP',
            ),
            new DTO\Seller(
                '562415149',
                'coup',
                '0',
                new DTO\Address(
                    'EG',
                    'el nozha',
                    'cairo',
                    'josef tito',
                    74,
                ),
                '13NQ9Z1',
                '4751',
                ''
            ),
            new DTO\Receiver(
                '',
                'sp',
                'P',
            ),
            [
                new DTO\InvoiceLine(
                    '651560342102998395',
                    '1400015',
                    'EGS',
                    'EG-562415149-1400015',
                    1,
                    'CS',
                    657.89,
                    657.89,
                    657.89,
                    749.995,
                    [
                        new DTO\Discount(
                            0,
                            'Commercial Discount'
                        ),
                    ],
                    [],
                    0,
                    [
                        new DTO\TaxableItem(
                            'T1',
                            92.105,
                            'V009',
                            14,
                        ),
                    ],
                ),
            ],
            657.89,
            749.995,
            657.89,
            'C'
        );

        try {
            app(Receipt::class)->submit($receipt, function ($response) {
                dd($response);
            });
        } catch (Exception $e) {
            $this->fail($e->getMessage());
        }
    }

    /** @test */
    public function it_saves_the_response_errors(): void
    {
        Http::fake([
            '/connect/token' => fn () => AuthResponses::successResponse(),
            '/documentsubmissions' => fn () => InvoiceResponses::validationResponse(),
        ]);

        $receipt = new DTO\Invoice(
            new DTO\Issuer(),
            new DTO\Receiver(),
            now()->toDateTimeLocalString(),
            123,
            fake()->randomNumber(),
        );

        try {
            app(Invoice::class)->submit($receipt, function ($response) {
                $this->assertNull($response['submissionId']);
                $this->assertIsArray($response['acceptedDocuments']);
                $this->assertIsArray($response['rejectedDocuments']);
                $this->assertCount(0, $response['acceptedDocuments']);
                $this->assertCount(1, $response['rejectedDocuments']);
            });
        } catch (Exception $e) {
            $this->fail($e->getMessage());
        }
    }
}
