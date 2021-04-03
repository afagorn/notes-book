<?php
declare(strict_types=1);

namespace core\Collection;

//abstract class AbstractBaseCollection implements \IteratorAggregate, \ArrayAccess, \Countable
abstract class AbstractBaseCollection extends \ArrayObject
{
    /**
     * Класс сущности для коллекции
     */
    public const ITEM_CLASS = '';

    /**
     * @var array
     */
    protected array $items;

    /**
     * @param object $value
     * @return object
     */
    protected function checkItem(object $value): object
    {
        $class = static::ITEM_CLASS;
        if (!$value instanceof $class) {
            throw new \InvalidArgumentException('Item must be type of ' . $class);
        }

        return $value;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->items);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param mixed $offset
     * @return object|null
     */
    public function offsetGet($offset)
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return object
     */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $this->checkItem($value);

        return $this;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}
