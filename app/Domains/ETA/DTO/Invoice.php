<?php

namespace App\Domains\ETA\DTO;

class Invoice extends Document
{
    /**
     * Document type name. Must be i for invoice.
     *
     * @var string|null
     */
    public ?string $documentType = 'I';

    /**
     * Document type version name. Must be 1.0 for this version.
     *
     * @var string|null
     */
    public ?string $documentTypeVersion = '1.0';
}
