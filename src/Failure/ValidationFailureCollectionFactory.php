<?php

declare(strict_types=1);

/*
 * This file is part of the Awurth Validator package.
 *
 * (c) Alexis Wurth <awurth.dev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awurth\Validator\Failure;

/**
 * Handles the creation of a validation failure collection.
 *
 * @author Alexis Wurth <awurth.dev@gmail.com>
 */
final class ValidationFailureCollectionFactory implements ValidationFailureCollectionFactoryInterface
{
    public function create(iterable $failures = []): ValidationFailureCollectionInterface
    {
        return new ValidationFailureCollection($failures);
    }
}
