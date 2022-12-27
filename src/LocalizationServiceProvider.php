<?php

namespace Bengr\Localization;

use Bengr\Localization\Rules\ValidCountryCode;
use Bengr\Localization\Rules\ValidCurrencyCode;
use Bengr\Localization\Rules\ValidLanguageCode;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rule;

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
        Rule::macro('validCountryCode', fn () => new ValidCountryCode());
        Rule::macro('validLanguageCode', fn () => new ValidLanguageCode());
        Rule::macro('validCurrencyCode', fn () => new ValidCurrencyCode());
    }
}
