<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Rules;

use InvalidArgumentException;
use Psr\Http\Message\UploadedFileInterface;
use Respect\Validation\Rules\Core\Simple;

final class FileMaxSize extends Simple
{
    private int $maxSize;

    public function __construct(int|string $maxSize)
    {
        $this->maxSize = is_string($maxSize) ? self::parseSize($maxSize) : $maxSize;
    }

    public function isValid(mixed $input): bool
    {
        if (!$input instanceof UploadedFileInterface) {
            return false;
        }

        return $input->getSize() <= $this->maxSize;
    }

    private static function parseSize(string $size): int
    {
        $units = ['B' => 1, 'KB' => 1024, 'MB' => 1048576, 'GB' => 1073741824];
        $size = strtoupper(trim($size));

        if (preg_match('/^(\d+(?:\.\d+)?)\s*(B|KB|MB|GB)$/', $size, $m)) {
            return (int) ($m[1] * $units[$m[2]]);
        }

        throw new InvalidArgumentException("Invalid size format: '{$size}'. Use e.g.: '5MB', '500KB'.");
    }
}
