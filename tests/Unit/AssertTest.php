<?php
declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset\Tests\Unit;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

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
        $this->expectException(Exception::class);
        Assert::assertArraySubset('string', '');
    }

    public function testAssertArraySubsetThrowsExceptionForInvalidArrayArgument(): void
    {
        $this->expectException(Exception::class);
        Assert::assertArraySubset([], '');
    }

    public function testAssertArraySubsetDoesNothingForValidScenario(): void
    {
        Assert::assertArraySubset([1, 2], [1, 2, 3]);
    }
}
