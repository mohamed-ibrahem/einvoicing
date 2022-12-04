<?php

namespace Tests\Unit\ETA\APIs;

use App\Domains\Branch\Models\Branch;
use App\Domains\ETA\APIs\Auth;
use Illuminate\Support\Facades\Http;
use Tests\Fixtures\ETA\APIs\AuthResponses;
use Tests\TestCase;

/** @see Auth */
class AuthTest extends TestCase
{
    /** @test */
    public function it_can_handle_the_request(): void
    {
        Http::fake([
            '/connect/token' => fn () => AuthResponses::successResponse(),
        ]);

        $auth = app(Auth::class)->login(
            Branch::factory()->create()
        );

        $this->assertEquals('token', $auth->token);
        $this->assertEquals('Bearer', $auth->tokenType);
        $this->assertEquals(600, $auth->expires_in);
        $this->assertEquals('InvoicingAPI', $auth->scope);
    }

    /** @test */
    public function it_throw_error_when_client_is_invalid(): void
    {
        Http::fake([
            '/connect/token' => fn () => AuthResponses::failedWithError('error message'),
        ]);

        $this->expectExceptionMessage('error message');

        app(Auth::class)->login(
            Branch::factory()->create()
        );
    }
}
