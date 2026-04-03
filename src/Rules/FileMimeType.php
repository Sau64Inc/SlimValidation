<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Rules;

use Psr\Http\Message\UploadedFileInterface;
use Respect\Validation\Rules\Core\Simple;

final class FileMimeType extends Simple
{
    /** @var string[] */
    private array $allowedTypes;

    /**
     * @param string[] $allowedTypes e.g.: ['image/jpeg', 'image/png', 'image/*']
     */
    public function __construct(array $allowedTypes)
    {
        $this->allowedTypes = $allowedTypes;
    }

    public function isValid(mixed $input): bool
    {
        if (!$input instanceof UploadedFileInterface) {
            return false;
        }

        $uri = $input->getStream()->getMetadata('uri');
        if (!$uri) {
            return false;
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($uri);

        foreach ($this->allowedTypes as $allowed) {
            if (str_contains($allowed, '/*')) {
                $prefix = strstr($allowed, '/*', true) . '/';
                if (str_starts_with($mime, $prefix)) {
                    return true;
                }
            } elseif ($mime === $allowed) {
                return true;
            }
        }

        return false;
    }
}
