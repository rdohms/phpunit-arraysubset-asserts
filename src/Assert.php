<?php
declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset;

use ArrayAccess;
use DMS\PHPUnitExtensions\ArraySubset\Constraint\ArraySubset;
use Exception;
use PHPUnit\Framework\Assert as PhpUnitAssert;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Util\InvalidArgumentHelper;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use function is_array;

final class Assert
{
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess $subset
     * @param array|ArrayAccess $array
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        if (! (is_array($subset) || $subset instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
                1,
                'array or ArrayAccess'
            );
        }
        if (! (is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }
        $constraint = new ArraySubset($subset, $checkForObjectIdentity);
        PhpUnitAssert::assertThat($array, $constraint, $message);
    }
}
