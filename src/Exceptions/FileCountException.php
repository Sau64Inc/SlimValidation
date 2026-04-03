<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class FileCountException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Must contain between {{minValue}} and {{maxValue}} files',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Must not contain between {{minValue}} and {{maxValue}} files',
        ],
    ];
}