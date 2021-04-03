<?php
declare(strict_types=1);

namespace core\Collection\Entity;

use core\Collection\AbstractBaseCollection;

/**
 * Class AbstractCustomIDCollection
 * @package core\Collection
 */
abstract class AbstractCustomIDCollection extends AbstractBaseCollection
{
    /**
     * @param int|string $id
     * @param object $value
     */
    public function add(int | string $id, object $value): void
    {
        $this->items[$id] = $this->checkItem($value);
    }
}
