# PHPUnit AssertArraySubset Extension

In PHPUnit 8 the function `assertArraySubset` was [deprecated](https://github.com/sebastianbergmann/phpunit/issues/3494). This function was often misunderstood and thus removed, but it still holds true as a very useful tool, hence it was extracted here.

**Disclaimer:**
The initial version contained here is copied over from phpunit and is heavily based on the original work by [Márcio Almada](https://github.com/marcioAlmada).

## Installation

Simply use it by importing it with Composer

```
composer require --dev dms/phpunit-arraysubset-asserts
```

> :bulb: The package can be safely required on PHP 5.4 to current in combination with PHPUnit 4.8.36/5.7.21 to current.
>
> When the PHPUnit `assertArraySubset()` method is natively available and not deprecated (PHPUnit 4.x - 7.x),
> the PHPUnit native functionality will be used.
> For PHPUnit 8 and higher, the extension will kick in and polyfill the functionality which was removed from PHPUnit.


## Usage

You have two options to use this in your classes: either directly as a static call or as a trait if you wish to keep existing references working.

### Trait use example

```php
<?php

namespace Your\Package\Tests;

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    use ArraySubsetAsserts;

    public function testWithTrait(): void
    {
        $expectedSubset = ['bar' => 0];

        $content = ['bar' => '0'];

        self::assertArraySubset($expectedSubset, $content, true);

        $content = ['foo' => '1'];

        $this->assertArraySubset($expectedSubset, $content, true);
    }
}
```

### Static class method example

```php
<?php

namespace Your\Package\Tests;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testWithDirectCall(): void
    {
        $expectedSubset = ['bar' => 0];

        $content = ['bar' => '0'];

        Assert::assertArraySubset($expectedSubset, $content, true);
    }
}
```
