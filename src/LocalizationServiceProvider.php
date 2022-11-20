<?php

namespace Bengr\Localization;

use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/localization.php', 'localization');

        $this->app->singleton('localization', function () {
            return new Localization();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/localization.php' => config_path('localization.php'),
        ], 'localization-config');
    }
}
