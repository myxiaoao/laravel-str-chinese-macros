<?php

namespace Cooper\StrChineseMacros\Test\Macros;

use Cooper\StrChineseMacros\Test\TestCase;
use Illuminate\Support\Str;

class IsChineseTest extends TestCase
{
    /**
     * @test
     */
    public function is_chinese_valid(): void
    {
        $isChinese = Str::isChinese('我是中文');

        $this->assertTrue($isChinese);

        $isEnglish = Str::isChinese('I am English');

        $this->assertFalse($isEnglish);
    }
}
