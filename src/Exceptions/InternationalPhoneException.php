<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class InternationalPhoneException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a valid international phone number',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a valid international phone number',
        ],
    ];
}
