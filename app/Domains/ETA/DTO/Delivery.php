<?php

namespace App\Domains\ETA\DTO;

class Delivery
{
    /**
     * @param  string|null  $approach Information on the approach for delivery used, means of transportation.
     * @param  string|null  $packaging Information on types of packages used when delivering the goods.
     * @param  string|null  $dateValidity Validity date for exported products.
     * @param  string|null  $exportPort Port exporting the goods.
     * @param  string|null  $countryOfOrigin Country of origin of goods/services. Country represented by ISO-3166-2 2 symbol code of the countries.
     * @param  float|null  $grossWeight Total weight of the goods delivered. Value in kilograms.
     * @param  float|null  $netWeight Net weight of the goods delivered. Value in kilograms.
     * @param  string|null  $terms Delivery terms/shipping terms information.
     */
    public function __construct(
        public readonly ?string $approach = null,
        public readonly ?string $packaging = null,
        public readonly ?string $dateValidity = null,
        public readonly ?string $exportPort = null,
        public readonly ?string $countryOfOrigin = null,
        public readonly ?float $grossWeight = null,
        public readonly ?float $netWeight = null,
        public readonly ?string $terms = null,
    ) {
        //
    }
}
