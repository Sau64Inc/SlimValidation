<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class Int32Exception extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be a signed 32-bit integer (-2147483648 to 2147483647)',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be a signed 32-bit integer',
        ],
    ];
}
