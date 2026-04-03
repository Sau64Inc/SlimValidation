<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Rules;

use Psr\Http\Message\UploadedFileInterface;
use Respect\Validation\Rules\Core\Simple;

final class FileCount extends Simple
{
    private int $minValue;
    private int $maxValue;

    public function __construct(int $min, ?int $max = null)
    {
        $this->minValue = $min;
        $this->maxValue = $max ?? $min;
    }

    public function isValid(mixed $input): bool
    {
        if ($input instanceof UploadedFileInterface) {
            $count = 1;
        } elseif (is_array($input)) {
            $count = count($input);
        } else {
            return false;
        }

        return $count >= $this->minValue && $count <= $this->maxValue;
    }
}
