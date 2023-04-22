<?php

declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset;

use ArrayAccess;
use DMS\PHPUnitExtensions\ArraySubset\Constraint\ArraySubset;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\Assert as PhpUnitAssert;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\InvalidArgumentException as PHPUnitInvalidArgumentException;
use PHPUnit\Util\InvalidArgumentHelper;

use function class_exists;
use function is_array;
use function method_exists;

trait ArraySubsetAsserts
{
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess|mixed[] $subset
     * @param array|ArrayAccess|mixed[] $array
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        if (! (is_array($subset) || $subset instanceof ArrayAccess)) {
            if (
                class_exists(PHPUnitInvalidArgumentException::class)
                && method_exists(PHPUnitInvalidArgumentException::class, 'create')
            ) {
                // PHPUnit 8.4.0+ < 10.0.0.
                throw PHPUnitInvalidArgumentException::create(
                    1,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit < 8.4.0.
            if (class_exists(InvalidArgumentHelper::class)) {
                throw InvalidArgumentHelper::factory(
                    1,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit 10+
            throw new InvalidArgumentException('Argument #1 $subset of assertArraySubset() must be array or ArrayAccess.');
        }

        if (! (is_array($array) || $array instanceof ArrayAccess)) {
            if (
                class_exists(PHPUnitInvalidArgumentException::class)
                && method_exists(PHPUnitInvalidArgumentException::class, 'create')
            ) {
                // PHPUnit 8.4.0+ < 10.0.0.
                throw PHPUnitInvalidArgumentException::create(
                    2,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit < 8.4.0.
            if (class_exists(InvalidArgumentHelper::class)) {
                throw InvalidArgumentHelper::factory(
                    2,
                    'array or ArrayAccess'
                );
            }

            // PHPUnit 10+
            throw new InvalidArgumentException('Argument #2 array of assertArraySubset() must be array or ArrayAccess.');
        }

        $constraint = new ArraySubset($subset, $checkForObjectIdentity);
        PhpUnitAssert::assertThat($array, $constraint, $message);
    }
}
