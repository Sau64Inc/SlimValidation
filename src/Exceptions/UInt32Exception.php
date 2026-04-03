<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class UInt32Exception extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be an unsigned 32-bit integer (0 to 4294967295)',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not be an unsigned 32-bit integer',
        ],
    ];
}
