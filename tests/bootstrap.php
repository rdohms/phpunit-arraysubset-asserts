<?php
/**
 * PHPUnit bootstrap file.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 */

if (defined('__PHPUNIT_PHAR__')) {
    // Testing via a PHPUnit phar.
    require_once __DIR__ . '/../assertarraysubset-autoload.php';
} elseif (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    // Testing via a Composer install.
    require_once __DIR__ . '/../vendor/autoload.php';
} else {
    echo 'Run "composer install" before attempting to run the tests.';
    exit(1);
}
