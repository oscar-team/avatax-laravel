<?php

namespace OscarTeam\AvaTax;

use Avalara\AvaTaxClient;
use Illuminate\Support\ServiceProvider;

class AvaTaxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/avatax.php', 'avatax');

        $this->app->singleton(AvaTaxClient::class, function ($app) {
            $appName = config('avatax.app_name');
            $appVersion = config('avatax.app_version');
            $machineName = config('avatax.machine_name');
            $environment = config('avatax.environment');
            $accountId = config('avatax.account_id');
            $licenseKey = config('avatax.license_key');

            $client = new AvaTaxClient($appName, $appVersion, $machineName, $environment);
            $client->withLicenseKey($accountId, $licenseKey);
            return $client;
        });

        $this->app->singleton('avatax', function ($app) {
            return new AvaTax($this->app->make(AvaTaxClient::class));
        });
    }
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/avatax.php' => config_path('avatax.php'),
        ]);
    }
}
