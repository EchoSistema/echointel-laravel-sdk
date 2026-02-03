<?php

declare(strict_types=1);

namespace EchoIntel;

use Illuminate\Support\ServiceProvider;

class EchoIntelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/echointel.php',
            'echointel'
        );

        $this->app->singleton('echointel', function ($app) {
            return new EchoIntelClient([
                'base_url' => config('echointel.api_url'),
                'customer_api_id' => config('echointel.customer_api_id'),
                'secret' => config('echointel.secret'),
                'admin_secret' => config('echointel.admin_secret'),
                'timeout' => config('echointel.timeout'),
                'retry' => config('echointel.retry'),
            ]);
        });

        $this->app->alias('echointel', EchoIntelClient::class);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/echointel.php' => config_path('echointel.php'),
            ], 'echointel-config');
        }
    }
}
