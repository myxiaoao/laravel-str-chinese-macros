<?php

namespace Cooper\StrChineseMacros\Test\Macros;

use Cooper\StrChineseMacros\Test\TestCase;
use Illuminate\Support\Str;

class ParseAddressTest extends TestCase
{
    /** @test */
    public function it_can_parse_address(): void
    {
        $data = Str::parseAddress('北京市朝阳区朝阳门南大街2号');

        $this->assertEquals('北京市', $data['province']);
    }
}
