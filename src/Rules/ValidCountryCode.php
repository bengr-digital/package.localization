<?php

namespace Bengr\Localization\Rules;

use Bengr\Localization\Facades\Localization;
use Bengr\Support\Rules\Concerns\CustomRule;
use Illuminate\Contracts\Validation\Rule;

class ValidCountryCode implements Rule
{
    use CustomRule;

    public function handle($attribute, $value)
    {
        if (!Localization::countries()->has($value)) {
            $this->setError(__("validation.country_code"));
        }
    }
}
