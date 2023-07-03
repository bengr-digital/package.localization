<?php

namespace Bengr\Localization\Tests\Unit;

use Bengr\Localization\Facades\Localization;
use Bengr\Localization\Tests\TestCase;
use Illuminate\Support\Str;

class CurrencyTest extends TestCase
{
    public function test_currencies_has_czk()
    {
        $this->assertTrue(Localization::currencies()->has('czk'));
    }

    public function test_currencies_get_czk_with_cs_locale()
    {
        app()->setLocale('cs');

        $this->assertEquals('česká koruna', Str::of(Localization::currencies()->get('czk'))->lower());
    }

    public function test_currencies_get_czk_with_en_locale()
    {
        app()->setLocale('en');

        $this->assertEquals('czech koruna', Str::of(Localization::currencies()->get('czk'))->lower());
    }

    public function test_currencies_all_returns_array_of_correct_length()
    {
        $this->assertEquals(285, count(Localization::currencies()->all()));
    }

    public function test_currencies_all_returns_array_that_has_czk()
    {
        $this->assertTrue(array_key_exists('CZK', Localization::currencies()->all()));
    }

    public function test_currencies_locale_is_applied()
    {
        app()->setLocale('en');

        $this->assertEquals('česká koruna', Str::of(Localization::currencies()->locale('cs')->get('czk'))->lower());
    }
}
