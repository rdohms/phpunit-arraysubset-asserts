<?php

declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset;

use ArrayAccess;
use DMS\PHPUnitExtensions\ArraySubset\Constraint\ArraySubset;
use Exception;
use PHPUnit\Framework\Assert as PhpUnitAssert;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Util\InvalidArgumentHelper;

use function class_exists;
use function is_array;

trait ArraySubsetAsserts
{
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess|mixed[] $subset
     * @param array|ArrayAccess|mixed[] $array
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException|Exception
     * @throws Exception
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        if (! (is_array($subset) || $subset instanceof ArrayAccess)) {
            if (class_exists(InvalidArgumentException::class)) {
                // PHPUnit 8.4.0+.
                throw InvalidArgumentException::create(
                    1,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit < 8.4.0.
            throw InvalidArgumentHelper::factory(
                1,
                'array or ArrayAccess'
            );
        }

        if (! (is_array($array) || $array instanceof ArrayAccess)) {
            if (class_exists(InvalidArgumentException::class)) {
                // PHPUnit 8.4.0+.
                throw InvalidArgumentException::create(
                    2,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit < 8.4.0.
            throw InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $constraint = new ArraySubset($subset, $checkForObjectIdentity);
        PhpUnitAssert::assertThat($array, $constraint, $message);
    }
}
