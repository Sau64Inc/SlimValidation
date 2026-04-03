<?php

declare(strict_types=1);

namespace Sau64Inc\SlimValidation;

use Respect\Validation\Validator;

/**
 * Validation helper that extends Respect\Validation\Validator.
 * Provides IDE autocompletion for custom rules registered via Factory.
 *
 * Usage: use Sau64Inc\SlimValidation\V;
 *
 * @method static Validator fileUploaded()
 * @method static Validator fileMaxSize(int|string $maxSize)
 * @method static Validator fileMimeType(array $allowedTypes)
 * @method static Validator numeric()
 */
class V extends Validator
{
}
