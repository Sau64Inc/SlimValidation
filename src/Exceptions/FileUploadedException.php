<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class FileUploadedException extends ValidationException
{
    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'Must be a successfully uploaded file',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'Must not be an uploaded file',
        ],
    ];
}
