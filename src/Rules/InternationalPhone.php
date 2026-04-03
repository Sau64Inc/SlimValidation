<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation\Rules;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use Respect\Validation\Rules\Core\Simple;

final class InternationalPhone extends Simple
{
    public function isValid(mixed $input): bool
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            if (!is_string($input) || !str_starts_with($input, '+')) {
                return false;
            }

            $phoneNumber = $phoneUtil->parse($input, null);

            return $phoneUtil->isValidNumber($phoneNumber);
        } catch (NumberParseException) {
            return false;
        }
    }
}
