<?php

namespace App\Domains\ETA\DTO;

class Seller
{
    /**
     * @param  string  $rin
     * @param  string  $companyTradeName
     * @param  string  $branchCode
     * @param  Address  $branchAddress
     * @param  string  $deviceSerialNumber
     * @param  string  $activityCode
     * @param  string|null  $syndicateLicenseNumber
     */
    public function __construct(
        public readonly string $rin,
        public readonly string $companyTradeName,
        public readonly string $branchCode,
        public readonly Address $branchAddress,
        public readonly string $deviceSerialNumber,
        public readonly string $activityCode,
        public readonly ?string $syndicateLicenseNumber,
    ) {
        //
    }
}
