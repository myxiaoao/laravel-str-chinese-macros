<?php

namespace Cooper\StrChineseMacros\Macros;

use Cooper\StrChineseMacros\Address;
use Illuminate\Support\Str;

/**
 * Parse China Address
 *
 * @param  string  $address
 *
 * @mixin Str
 *
 * @return array
 */
class ParseAddress
{
    public function __invoke(): \Closure
    {
        return static function (string $address): array {
            return Address::parse($address);
        };
    }
}
