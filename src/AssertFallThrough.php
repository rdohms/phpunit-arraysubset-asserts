<?php

namespace DMS\PHPUnitExtensions\ArraySubset;

use PHPUnit\Framework\Assert as PhpUnitAssert;

/**
 * Assert class for use with PHPUnit 4.x - 7.x.
 *
 * The method in this class will fall through to PHPUnit itself and use the PHPUnit
 * native `assertArraySubset()` method.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 */
final class Assert
{
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess|mixed[] $subset
     * @param array|ArrayAccess|mixed[] $array
     * @param bool                      $checkForObjectIdentity
     * @param string                    $message
     *
     * @throws ExpectationFailedException
     * @throws InvalidArgumentException|Exception
     * @throws Exception
     */
    public static function assertArraySubset($subset, $array, $checkForObjectIdentity = false, $message = '')
    {
        PhpUnitAssert::assertArraySubset($subset, $array, $checkForObjectIdentity, $message);
    }
}
