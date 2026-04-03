<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class FileMaxSizeException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must not exceed the maximum file size',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must exceed the maximum file size',
        ],
    ];
}
