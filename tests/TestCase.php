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

    public function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app): array
    {
        return [
            StrChineseMacrosServiceProvider::class
        ];
    }
}
