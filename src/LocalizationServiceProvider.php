<?php

namespace Bengr\Localization;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('localization', function () {
            return new Localization(__DIR__ . '/../data');
        });
    }

    public function boot()
    {
    }
}
