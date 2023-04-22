<?php

declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset\Tests\Unit;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
<<<<<<< HEAD
use InvalidArgumentException;
use PHPUnit\Framework\Exception as PHPUnitException;
||||||| parent of 9a75e74 (PHPunit10)
use PHPUnit\Framework\Exception;
=======
use PHPUnit\Framework\Exception as PHPUnitException;
>>>>>>> 9a75e74 (PHPunit10)
use PHPUnit\Framework\ExpectationFailedException;
<<<<<<< HEAD
use PHPUnit\Framework\InvalidArgumentException as PHPUnitInvalidArgumentException;
||||||| parent of 9a75e74 (PHPunit10)
=======
use \InvalidArgumentException;
use PHPUnit\Framework\InvalidArgumentException as PHPUnitInvalidArgumentException;
>>>>>>> 9a75e74 (PHPunit10)
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Util\InvalidArgumentHelper;

use function class_exists;
use function method_exists;
||||||| parent of 9a75e74 (PHPunit10)
=======
use PHPUnit\Util\InvalidArgumentHelper;
use function class_exists;
use function method_exists;
>>>>>>> 9a75e74 (PHPunit10)

/**
 * @requires PHPUnit >= 8
 */
final class AssertTest extends TestCase
{
    public function testAssertArraySubsetPassesStrictConfig(): void
    {
        $this->expectException(ExpectationFailedException::class);
        Assert::assertArraySubset(['bar' => 0], ['bar' => '0'], true);
    }

    public function testAssertArraySubsetThrowsExceptionForInvalidSubset(): void
    {
        $this->expectException(ExpectationFailedException::class);
        Assert::assertArraySubset([6, 7], [1, 2, 3, 4, 5, 6]);
    }

    public function testAssertArraySubsetThrowsExceptionForInvalidSubsetArgument(): void
    {
        $this->expectException($this->getExpectedExceptionByVersion());
        Assert::assertArraySubset('string', '');
    }

    public function testAssertArraySubsetThrowsExceptionForInvalidArrayArgument(): void
    {
        $this->expectException($this->getExpectedExceptionByVersion());
        Assert::assertArraySubset([], '');
    }

    public function testAssertArraySubsetDoesNothingForValidScenario(): void
    {
        Assert::assertArraySubset([1, 2], [1, 2, 3]);
    }
<<<<<<< HEAD

    private function getExpectedExceptionByVersion(): string
    {
        if (
            class_exists(PHPUnitInvalidArgumentException::class)
            && method_exists(PHPUnitInvalidArgumentException::class, 'create')
        ) {
            return PHPUnitException::class;
        }

        if (class_exists(InvalidArgumentHelper::class)) {
            return PHPUnitException::class;
        }

        return InvalidArgumentException::class;
    }
||||||| parent of 9a75e74 (PHPunit10)
=======

    private function getExpectedExceptionByVersion() {
        if (class_exists(PHPUnitInvalidArgumentException::class)
            && method_exists(PHPUnitInvalidArgumentException::class, 'create')){
            return PHPUnitException::class;
        }

        if (class_exists(InvalidArgumentHelper::class)){
            return PHPUnitException::class;
        }

        return InvalidArgumentException::class;
    }
>>>>>>> 9a75e74 (PHPunit10)
}
