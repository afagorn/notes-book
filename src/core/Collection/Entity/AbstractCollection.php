<?php
declare(strict_types=1);

namespace core\Collection\Entity;

use core\Collection\AbstractBaseCollection;

/**
 * Class AbstractCollection
 * @package core\Collection
 */
abstract class AbstractCollection extends AbstractBaseCollection
{
    /**
     * @param object $value
     */
    public function add(object $value): void
    {
        $this->items[] = $this->checkItem($value);
    }
}