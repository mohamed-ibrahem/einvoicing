<?php

namespace App\Domains\ETA\DTO;

class Header
{
    /**
     * @param  string  $dateTimeIssued
     * @param  string  $receiptNumber
     * @param  string  $uuid
     * @param  string  $previousUUID
     * @param  string  $currency
     * @param  string|null  $referenceOldUUID
     * @param  string|null  $exchangeRate
     * @param  string|null  $sOrderNameCode
     * @param  string|null  $orderdeliveryMode
     * @param  string|null  $grossWeight
     * @param  string|null  $netWeight
     */
    public function __construct(
        public readonly string $dateTimeIssued,
        public readonly string $receiptNumber,
        public readonly string $uuid,
        public readonly string $previousUUID,
        public readonly string $currency,
        public readonly ?string $referenceOldUUID = null,
        public readonly ?string $exchangeRate = null,
        public readonly ?string $sOrderNameCode = null,
        public readonly ?string $orderdeliveryMode = null,
        public readonly ?string $grossWeight = null,
        public readonly ?string $netWeight = null,
    ) {
        //
    }
}
