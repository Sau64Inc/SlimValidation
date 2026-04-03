<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Rules;

use Respect\Validation\Rules\Core\Simple;

final class UInt32 extends Simple
{
    public function isValid(mixed $input): bool
    {
        if (is_float($input) || is_bool($input)) {
            return false;
        }

        return false !== filter_var($input, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 0, 'max_range' => 4294967295],
            'flags' => FILTER_FLAG_ALLOW_OCTAL,
        ]);
    }
}
