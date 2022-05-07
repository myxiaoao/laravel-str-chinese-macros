<?php

namespace Cooper\StrChineseMacros\Test;

use Cooper\StrChineseMacros\StrChineseMacrosServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            StrChineseMacrosServiceProvider::class
        ];
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
