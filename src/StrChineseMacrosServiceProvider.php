<?php

namespace Cooper\StrChineseMacros;

use Cooper\StrChineseMacros\Macros\IsChinese;
use Cooper\StrChineseMacros\Macros\ParseAddress;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class StrChineseMacrosServiceProvider extends ServiceProvider
{
    public array $macros = [
        'parseAddress' => ParseAddress::class,
        'isChinese' => IsChinese::class,
    ];

    public function register(): void
    {
        Collection::make($this->macros)
            ->reject(fn($class, $macro) => Str::hasMacro($macro))
            ->each(fn($class, $macro) => Str::macro($macro, app($class)()));
    }
}
