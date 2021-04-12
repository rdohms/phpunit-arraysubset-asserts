<?php

namespace DMS\PHPUnitExtensions\ArraySubset;

if (\class_exists('DMS\PHPUnitExtensions\ArraySubset\Autoload', false) === false) {

    /**
     * Custom autoloader.
     *
     * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
     */
    class Autoload
    {
        /**
         * Loads a class.
         *
         * @param string $className The name of the class to load.
         *
         * @return bool
         */
        public static function load($className)
        {
            // Only load classes belonging to this library.
            if (\stripos($className, 'DMS\PHPUnitExtensions\ArraySubset') !== 0) {
                return false;
            }

            switch ($className) {
                case 'DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts':
                    if (\method_exists('\PHPUnit\Framework\Assert', 'assertArraySubset') === false) {
                        // PHPUnit >= 9.0.0.
                        require_once __DIR__ . '/src/ArraySubsetAsserts.php';

                        return true;
                    }

                    // PHPUnit < 9.0.0.
                    require_once __DIR__ . '/src/ArraySubsetAssertsEmpty.php';

                    return true;

                case 'DMS\PHPUnitExtensions\ArraySubset\Assert':
                    if (\method_exists('\PHPUnit\Framework\Assert', 'assertArraySubset') === false) {
                        // PHPUnit >= 9.0.0.
                        require_once __DIR__ . '/src/Assert.php';

                        return true;
                    }

                    // PHPUnit < 9.0.0.
                    require_once __DIR__ . '/src/AssertFallThrough.php';

                    return true;

                /*
                 * Handle arbitrary additional classes via PSR-4, but only allow loading on PHPUnit >= 9.0.0,
                 * as additional classes should only ever _need_ to be loaded when using PHPUnit >= 9.0.0.
                 */
                default:
                    if (\method_exists('\PHPUnit\Framework\Assert', 'assertArraySubset') === true) {
                        // PHPUnit < 9.0.0.
                        throw new \RuntimeException(
                            \sprintf(
                                'Using class "%s" is only supported in combination with PHPUnit >= 9.0.0',
                                $className
                            )
                        );
                    }

                    // PHPUnit >= 9.0.0.
                    $file = \realpath(
                        __DIR__ . \DIRECTORY_SEPARATOR
                        . 'src' . \DIRECTORY_SEPARATOR
                        . \strtr(\substr($className, 33), '\\', \DIRECTORY_SEPARATOR) . '.php'
                    );

                    if (\file_exists($file) === true) {
                        require_once $file;

                        return true;
                    }
            }

            return false;
        }
    }

    \spl_autoload_register(__NAMESPACE__ . '\Autoload::load');
}
