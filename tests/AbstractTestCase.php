<?php

namespace Gr8Shivam\SmsApi\Tests;

use Orchestra\Testbench\TestCase;
use Gr8Shivam\SmsApi\SmsApiServiceProvider;

abstract class AbstractTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SmsApiServiceProvider::class,
        ];
    }
    protected function getPackageAliases($app)
    {
        return [
            'SmsApi' => \Gr8Shivam\SmsApi\SmsApiFacade::class,
        ];
    }
}
