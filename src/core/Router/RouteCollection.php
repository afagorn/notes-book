<?php
declare(strict_types=1);

namespace core\Route;

use core\Collection\Entity\AbstractCustomIDCollection;

class RouteCollection extends AbstractCustomIDCollection
{
    public const ITEM_CLASS = Route::class;
}
