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
            $appName = config('avalara.app_name');
            $appVersion = config('avalara.app_version');
            $machineName = config('avalara.machine_name');
            $environment = config('avalara.environment');
            $username = config('avalara.account_id');
            $password = config('avalara.license_key');

            $client = new AvaTaxClient($appName, $appVersion, $machineName, $environment);
            $client->withSecurity($username, $password);
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
