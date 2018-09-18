<?php

namespace App\Enums;

use Nasyrov\Laravel\Enums\Enum;

class BaseEnum extends Enum
{
    public static function toValidationString()
    {
        __('qwe');
        return implode(',', static::values());
    }
}