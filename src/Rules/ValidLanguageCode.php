<?php

namespace Bengr\Localization\Rules;

use Bengr\Localization\Facades\Localization;
use Bengr\Support\Rules\Concerns\CustomRule;
use Illuminate\Contracts\Validation\Rule;

class ValidLanguageCode implements Rule
{
    use CustomRule;

    public function handle($attribute, $value)
    {
        if (!Localization::languages()->has($value)) {
            $this->setError("{$value} is not a valid language code");
        }
    }
}
