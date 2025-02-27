<?php

namespace Gr8Shivam\SmsApi;

use Illuminate\Support\ServiceProvider;
use Gr8Shivam\SmsApi\SmsApi;

class SmsApiServiceProvider extends ServiceProvider
{
    protected $defer = false;
    protected $configName = 'sms-api';

    public function boot()
    {
        $configPath = __DIR__ . '/config/' . $this->configName . '.php';
        $this->publishes([
            $configPath => config_path($this->configName . '.php')
        ], 'config');
    }

 
    public function register()
    {
        $configPath = __DIR__ . '/config/' . $this->configName . '.php';
        $this->mergeConfigFrom($configPath, $this->configName);
        $this->app->bind('smsapi', function () {
            return new SmsApi();
        });
    }
}
