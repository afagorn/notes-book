<?php
declare(strict_types=1);

namespace core\Exception\Route;

use core\Exception\AbstractException;
use JetBrains\PhpStorm\Pure;

class RoutePathNotFoundException extends AbstractException
{
    /**
     * @param string $path
     * @return RoutePathNotFoundException
     */
    #[Pure] public static function new(string $path): RoutePathNotFoundException
    {
        return new self(
            sprintf('Path %s not found in routes', $path)
        );
    }
}
