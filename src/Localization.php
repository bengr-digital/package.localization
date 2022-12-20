<?php

namespace Bengr\Localization;

use Bengr\Localization\Localizables\Country;
use Bengr\Localization\Localizables\Currency;
use Bengr\Localization\Localizables\Language;

class Localization
{
    protected string $path;
    protected string $locale;
    protected string $localizable;

    public function __construct($path)
    {
        $this->path = $path;
        $this->locale = app()->getLocale();
    }

    public function currencies()
    {
        $this->localizable = Currency::class;

        return $this;
    }

    public function languages()
    {
        $this->localizable = Language::class;

        return $this;
    }

    public function countries()
    {
        $this->localizable = Country::class;

        return $this;
    }

    public function locale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    public function has($code): ?bool
    {
        return app($this->localizable, [
            'path' => $this->path,
            'locale' => $this->locale,
        ])->has($code);
    }

    public function get($code): string
    {
        return app($this->localizable, [
            'path' => $this->path,
            'locale' => $this->locale,
        ])->get($code);
    }

    public function all(): array
    {
        return app($this->localizable, [
            'path' => $this->path,
            'locale' => $this->locale,
        ])->all();
    }
}
