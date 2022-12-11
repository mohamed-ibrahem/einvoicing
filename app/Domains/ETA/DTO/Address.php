<?php

namespace App\Domains\ETA\DTO;

class Address
{
    /**
     * @param  string|null  $country
     * @param  string|null  $regionCity
     * @param  string|null  $governate
     * @param  string|null  $street
     * @param  string|null  $buildingNumber
     * @param  string|null  $branchID
     * @param  string|null  $postalCode
     * @param  string|null  $floor
     * @param  string|null  $room
     * @param  string|null  $landmark
     * @param  string|null  $additionalInformation
     */
    public function __construct(
        public readonly ?string $country,
        public readonly ?string $regionCity,
        public readonly ?string $governate,
        public readonly ?string $street = null,
        public readonly ?string $buildingNumber = null,
        public readonly ?string $branchID = null,
        public readonly ?string $postalCode = null,
        public readonly ?string $floor = null,
        public readonly ?string $room = null,
        public readonly ?string $landmark = null,
        public readonly ?string $additionalInformation = null,
    ) {
        //
    }
}
