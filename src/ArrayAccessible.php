<?php

declare(strict_types=1);

namespace DMS\PHPUnitExtensions\ArraySubset;

use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use ReturnTypeWillChange;
use Traversable;

use function array_key_exists;

class ArrayAccessible implements ArrayAccess, IteratorAggregate
{
    /**
     * @var mixed[]
     */
    private $array;

    /**
     * @param mixed[] $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * @param mixed $offset
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->array);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    #[ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->array[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            $this->array[] = $value;
        } else {
            $this->array[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->array[$offset]);
    }

    /**
     * @return mixed[]
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->array);
    }
}
