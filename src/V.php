<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation;

use Respect\Validation\Validator;

/**
 * IDE helper that proxies static calls to Respect\Validation\Validator.
 * Since Validator is a final class, this uses delegation instead of inheritance.
 *
 * Usage: use Sau64Inc\SlimValidation\V;
 *
 * @method static Validator fileUploaded()
 * @method static Validator fileMaxSize(int|string $maxSize)
 * @method static Validator fileMimeType(array $allowedTypes)
 * @method static Validator numeric()
 * @method static Validator internationalPhone()
 * @method static Validator uInt32()
 * @method static Validator int32()
 */
class V
{
    /**
     * @param mixed[] $arguments
     */
    public static function __callStatic(string $ruleName, array $arguments): Validator
    {
        return Validator::__callStatic($ruleName, $arguments);
    }
}
