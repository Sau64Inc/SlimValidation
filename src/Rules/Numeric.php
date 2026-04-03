<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Rules;

use Respect\Validation\Rules\Core\Simple;

use function is_numeric;

final class Numeric extends Simple
{
    public function isValid(mixed $input): bool
    {
        return is_numeric($input);
    }
}
