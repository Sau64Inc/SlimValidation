<?php

declare(strict_types=1);

namespace Awurth\SlimValidation\Rules;

use Respect\Validation\Rules\AbstractRule;

use function is_numeric;

final class Numeric extends AbstractRule
{
    public function validate($input): bool
    {
        return is_numeric($input);
    }
}
