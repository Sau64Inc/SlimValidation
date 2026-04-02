<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class NumericException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be numeric',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be numeric',
        ],
    ];
}
