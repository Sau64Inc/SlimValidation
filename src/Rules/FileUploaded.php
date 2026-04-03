<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Rules;

use Psr\Http\Message\UploadedFileInterface;
use Respect\Validation\Rules\Core\Simple;

final class FileUploaded extends Simple
{
    public function isValid(mixed $input): bool
    {
        if (!$input instanceof UploadedFileInterface) {
            return false;
        }

        return $input->getError() === UPLOAD_ERR_OK;
    }
}
