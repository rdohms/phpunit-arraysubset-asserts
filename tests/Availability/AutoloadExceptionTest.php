<?php

namespace DMS\PHPUnitExtensions\ArraySubset\Tests\Availibility;

use DMS\PHPUnitExtensions\ArraySubset\Constraint\ArraySubset;
use PHPUnit\Framework\TestCase;

/**
 * Testing that autoloading classes which should only ever be loaded on PHPUnit >= 9 will
 * generate an exception when attempted on PHPUnit < 9..
 *
 * Note: the autoloading in combination with PHPUnit 9+ is automatically tested via the
 * actual tests for the polyfill as the class will be called upon.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 *
 * @requires PHPUnit < 9
 */
final class AutoloadExceptionTest extends TestCase
{
    public function testAutoloadException()
    {
        $expection = '\RuntimeException';
        $message   = 'Using class "DMS\PHPUnitExtensions\ArraySubset\Constraint\ArraySubset" is only supported in combination with PHPUnit >= 9.0.0';

        if (\method_exists('\PHPUnit\Framework\TestCase', 'expectException') === true) {
            $this->expectException($expection);
            $this->expectExceptionMessage($message);
        } else {
            $this->setExpectedException($expection, $message);
        }

        new ArraySubset();
    }
}
