<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class FileMimeTypeException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must have a valid MIME type',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must not have this MIME type',
        ],
    ];
}
