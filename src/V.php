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
 * @mixin \Respect\Validation\StaticValidator
 *
 * @method static V fileUploaded()
 * @method static V fileMaxSize(int|string $maxSize)
 * @method static V fileMimeType(array $allowedTypes)
 * @method static V numeric()
 * @method static V internationalPhone()
 * @method static V uInt32()
 * @method static V int32()
 * @method static V fileCount(int $min, ?int $max = null)
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
