<?php

namespace App\Domains\ETA\DTO;

class Signature
{
    /**
     * @param  string|null  $type
     * @param  string|null  $value
     */
    public function __construct(
        public readonly ?string $type,
        public readonly ?string $value,
    ) {
        //
    }

    /**
     * @param  mixed  $documentStructure
     * @return string
     */
    public static function serialize(mixed $documentStructure): string
    {
        if (! is_array($documentStructure)) {
            return '"'.$documentStructure.'"';
        }

        $serializedString = '';

        foreach ($documentStructure as $item => $value) {
            if (! is_array($value)) {
                $serializedString .= strtoupper('"'.$item.'"');
                $serializedString .= self::serialize($value);
            }

            if (is_array($value)) {
                $serializedString .= strtoupper('"'.$item.'"');
                foreach ($value as $subItem => $subValue) {
                    $serializedString .= is_int($subItem) ? strtoupper('"'.$item.'"') : strtoupper('"'.$subItem.'"');
                    $serializedString .= self::serialize($subValue);
                }
            }
        }

        return $serializedString;
    }
}
