<?php

namespace Cooper\StrChineseMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class StrChineseMacrosServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Collection::make($this->macros())
            ->reject(fn($class, $macro) => Str::hasMacro($macro))
            ->each(fn($class, $macro) => Str::macro($macro, app($class)()));
    }

    #[ArrayShape([
        'parseAddress' => "string",
        'isChinese' => 'string'
    ])]
    public function macros(): array
    {
        return [
            'parseAddress' => \Cooper\StrChineseMacros\Macros\ParseAddress::class,
            'isChinese' => \Cooper\StrChineseMacros\Macros\IsChinese::class,
        ];
    }
}
