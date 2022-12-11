<?php

namespace Tests\Unit\ETA\APIs;

use App\Domains\ETA\APIs\Invoice;
use App\Domains\ETA\DTO;
use Exception;
use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ETA\APIs\AuthResponses;
use Tests\Fixtures\ETA\APIs\InvoiceResponses;
use Tests\TestCase;

/** @see Invoice */
class InvoiceTest extends TestCase
{
    /** @test */
    public function it_can_submit_an_invoice(): void
    {
        Http::fake([
            '/connect/token' => fn () => AuthResponses::successResponse(),
        ]);

        $invoice = new DTO\Receipt(

            now()->toDateTimeLocalString()
        );

        try {
            app(Invoice::class)->submit($invoice, function ($response) {
                $this->assertNotNull($response['submissionId']);
                $this->assertIsArray($response['acceptedDocuments']);
                $this->assertIsArray($response['rejectedDocuments']);
                $this->assertCount(1, $response['acceptedDocuments']);
                $this->assertCount(0, $response['rejectedDocuments']);
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

        $invoice = new DTO\Invoice(
            new DTO\Issuer(),
            new DTO\Receiver(),
            now()->toDateTimeLocalString(),
            123,
            fake()->randomNumber(),
        );

        try {
            app(Invoice::class)->submit($invoice, function ($response) {
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
