<?php

namespace App\Domains\ETA\DTO;

class Address
{
    /**
     * @param string $country Country represented by ISO-3166-2 2 symbol code of the countries. Must be EG for internal business issuers.
     * @param string $regionCity Region and city information as textual value
     * @param string $governate Governorate information as textual value
     * @param string $street Street information
     * @param string $buildingNumber Building information
     * @param string|null $branchID Mandatory when issuer is of type B, otherwise optional. The code of the branch as registered with tax authority for the company submitting the document.
     * @param string|null $postalCode Postal code
     * @param string|null $floor The floor number
     * @param string|null $room The room/flat number in the floor
     * @param string|null $landmark Nearest landmark to the address
     * @param string|null $additionalInformation Any additional information to the address
     */
    public function __construct(
        public readonly string  $country,
        public readonly string  $regionCity,
        public readonly string  $governate,
        public readonly string  $street,
        public readonly string  $buildingNumber,
        public readonly ?string $branchID,
        public readonly ?string $postalCode,
        public readonly ?string $floor,
        public readonly ?string $room,
        public readonly ?string $landmark,
        public readonly ?string $additionalInformation,
    )
    {
        //
    }
}
