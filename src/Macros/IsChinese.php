<?php

namespace Cooper\StrChineseMacros\Macros;

use Illuminate\Support\Str;

/**
 * Check Chinese
 *
 * @param  string  $str
 *
 * @return bool
 * @mixin Str
 *
 */
class IsChinese
{
    public function __invoke(): \Closure
    {
        return static fn(string $str): bool => preg_match("/[\x{4e00}-\x{9fa5}]+/u", $str) === 1;
    }
}
