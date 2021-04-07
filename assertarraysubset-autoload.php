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

                        // Straight away load the other classes needed as well.
                        // These should only ever be loaded in this context anyway.
                        require_once __DIR__ . '/src/ArrayAccessible.php';
                        require_once __DIR__ . '/src/Constraint/ArraySubset.php';

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
            }

            return false;
        }
    }

    \spl_autoload_register(__NAMESPACE__ . '\Autoload::load');
}
