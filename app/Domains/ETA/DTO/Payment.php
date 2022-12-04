<?php

namespace App\Domains\ETA\DTO;

class Payment
{
    /**
     * @param  string|null  $bankName Name of the bank of document issuer.
     * @param  string|null  $bankAddress Address of the bank of document issuer. Captured as single line of text, not a structure.
     * @param  string|null  $bankAccountNo Local bank account number in the bank.
     * @param  string|null  $bankAccountIBAN International bank account number used primarily for international documents.
     * @param  string|null  $swiftCode International Swift code of the bank.
     * @param  string|null  $terms Description of the payment terms describing when and how payments needs to be made, for example.
     */
    public function __construct(
        public readonly ?string $bankName = null,
        public readonly ?string $bankAddress = null,
        public readonly ?string $bankAccountNo = null,
        public readonly ?string $bankAccountIBAN = null,
        public readonly ?string $swiftCode = null,
        public readonly ?string $terms = null,
    ) {
        //
    }
}
