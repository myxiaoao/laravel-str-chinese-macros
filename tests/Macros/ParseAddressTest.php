<?php

namespace Cooper\StrChineseMacros\Test\Macros;

use Cooper\StrChineseMacros\Test\TestCase;
use Illuminate\Support\Str;

class ParseAddressTest extends TestCase
{
    /** @test */
    public function it_can_parse_address(): void
    {
        $data = Str::parseAddress('广东省深圳市南山区深南大道');

        $this->assertEquals('广东省', $data['province']);
        $this->assertEquals('深圳市', $data['city']);
        $this->assertEquals('南山区', $data['district']);
    }
}
