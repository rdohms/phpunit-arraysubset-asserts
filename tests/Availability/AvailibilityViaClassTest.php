<?php

namespace DMS\PHPUnitExtensions\ArraySubset\Tests\Availibility;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use PHPUnit\Framework\TestCase;

/**
 * Testing that the autoloading of the fall-through `Assert` class for PHPUnit 4.x - 8.x works correctly.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 */
final class AvailibilityViaClassTest extends TestCase
{
    public function testAssertArraySubsetisAvailabe()
    {
        Assert::assertArraySubset([1, 2], [1, 2, 3]);
    }
}
