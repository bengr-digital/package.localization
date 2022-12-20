<?php

namespace Bengr\Localization\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Bengr\Localization\Localization currencies()
 * @method static \Bengr\Localization\Localization languages()
 * @method static \Bengr\Localization\Localization countries()
 * @method static \Bengr\Localization\Localization locale($locale)
 * @method static ?bool has($code)
 * @method static string get($code)
 * @method static array all()
 *
 * @see \Bengr\Localization\Localization
 */
class Localization extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "localization";
    }
}
