<?php

namespace Bengr\Localization\Tests\Unit;

use Bengr\Localization\Facades\Localization;
use Bengr\Localization\Tests\TestCase;
use Illuminate\Support\Str;

class LanguageTest extends TestCase
{
    public function test_languages_has_cs()
    {
        $this->assertTrue(Localization::languages()->has('cs'));
    }

    public function test_languages_get_cs_with_cs_locale()
    {
        app()->setLocale('cs');

        $this->assertEquals('čeština', Str::of(Localization::languages()->get('cs'))->lower());
    }

    public function test_languages_get_cs_with_en_locale()
    {
        app()->setLocale('en');

        $this->assertEquals('czech', Str::of(Localization::languages()->get('cs'))->lower());
    }

    public function test_languages_all_returns_array_of_correct_length()
    {
        $this->assertEquals(609, count(Localization::languages()->all()));
    }

    public function test_languages_all_returns_array_that_has_cs()
    {
        $this->assertTrue(array_key_exists('CS', Localization::languages()->all()));
    }

    public function test_languages_locale_is_applied()
    {
        app()->setLocale('en');

        $this->assertEquals('čeština', Str::of(Localization::languages()->locale('cs')->get('cs'))->lower());
    }
}
