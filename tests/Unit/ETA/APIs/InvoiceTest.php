<?php

namespace Tests\Unit\ETA\APIs;

use App\Domains\Branch\Models\Branch;
use App\Domains\ETA\APIs\Invoice;
use App\Domains\Invoice\Models\Invoice as InvoiceModel;
use App\Domains\Invoice\Models\InvoiceLine;
use Tests\TestCase;

/** @see Invoice */
class InvoiceTest extends TestCase
{
    /** @test */
    public function it_can_submit_an_invoice(): void
    {
        $invoice = InvoiceModel::factory()
            ->for(Branch::factory())
            ->has(InvoiceLine::factory(2))
            ->create();

        app(Invoice::class)->submit($invoice);
    }
}
