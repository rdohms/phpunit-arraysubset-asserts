# PHPUnit AssertArraySubset Extension

In PHPUnit 8 the function `assertArraySubset` was [deprecated](https://github.com/sebastianbergmann/phpunit/issues/3494). This function was often misunderstood and thus removed, but it still holds true as a very useful tool, hence it was extracted here.

**Disclaimer:**
The initial version contained here is copied over from phpunit and is heavily based on the original work by [Márcio Almada](https://github.com/marcioAlmada).

## Installation

Simply use it by importing it with Composer

```
composer require --dev dms/phpunit-arraysubset-asserts
```

## Usage

You have two options to use this in your classes: either directly as a static call or as a trait if you wish to keep existing references working.

```php
<?php
declare(strict_types=1);

namespace DMS\Tests;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use PHPUnit\Framework\TestCase;


final class AssertTest extends TestCase
{
    use ArraySubsetAsserts;
    
    public function testWithTrait(): void
    {
        $expectedSubset = ['bar' => 0];

        $content = ['bar' => '0'];

        self::assertArraySubset($expectedSubset, $content, true);
    }

    public function testWithDirectCall(): void
    {
        $expectedSubset = ['bar' => 0];

        $content = ['bar' => '0'];

        Assert::assertArraySubset($expectedSubset, $content, true);
    }
}

```
