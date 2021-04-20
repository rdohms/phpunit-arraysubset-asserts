<?php

namespace DMS\PHPUnitExtensions\ArraySubset\Tests\Availibility;

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use PHPUnit\Framework\TestCase;

/**
 * Testing that the autoloading of the empty `ArraySubsetAsserts` trait for PHPUnit 4.x - 8.x works correctly.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 */
final class AvailibilityViaTraitTest extends TestCase
{
    use ArraySubsetAsserts;

    public function testAssertArraySubsetisAvailabe()
    {
        static::assertArraySubset([1, 2], [1, 2, 3]);
        $this->assertArraySubset([1, 2], [1, 2, 3]);
    }
}
