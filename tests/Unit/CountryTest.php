<?php

namespace Bengr\Localization\Tests\Unit;

use Bengr\Localization\Facades\Localization;
use Bengr\Localization\Tests\TestCase;
use Illuminate\Support\Str;

class CountryTest extends TestCase
{
    public function test_countries_has_cz()
    {
        $this->assertTrue(Localization::countries()->has('cz'));
    }

    public function test_countries_get_cz_with_cs_locale()
    {
        app()->setLocale('cs');

        $this->assertEquals('česko', Str::of(Localization::countries()->get('cz'))->lower());
    }

    public function test_countries_get_cz_with_en_locale()
    {
        app()->setLocale('en');

        $this->assertEquals('czechia', Str::of(Localization::countries()->get('cz'))->lower());
    }

    public function test_countries_all_returns_array_of_correct_length()
    {
        $this->assertEquals(249, count(Localization::countries()->all()));
    }

    public function test_countries_all_returns_array_that_has_cz()
    {
        $this->assertTrue(array_key_exists('CZ', Localization::countries()->all()));
    }

    public function test_countries_locale_is_applied()
    {
        app()->setLocale('en');

        $this->assertEquals('česko', Str::of(Localization::countries()->locale('cs')->get('cz'))->lower());
    }
}
