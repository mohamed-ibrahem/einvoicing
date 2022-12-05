<?php

namespace App\Domains\ETA\DTO;

class Issuer
{
    /**
     * @param string $id Registration number. For business in Egypt must be registration number.
     * @param string $name Registration name of the company.
     * @param string $type Type of the issuer - supported values - B for business in Egypt, P for natural person, F for foreigner. Note that P and F are reserved values for future use.
     * @param Address|null $address Address structure of the issuer branch including branch code.
     */
    public function __construct(
        public readonly string $id = '0',
        public readonly string $name = 'Unknown',
        public readonly string $type = 'B',
        public readonly ?Address $address = null,
    ) {
        //
    }
}
