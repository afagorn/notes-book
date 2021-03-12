<?php
declare(strict_types=1);

namespace System\Route;

class Route
{
    public static array $routes;

    public static function add(string $name, string $controller, string $method)
    {

    }

    public static function addAPI(string $name, string $controller)
    {
        /*
            Если пришел GET, то запустить action index
            Если пришел POST, то запустить другой action
         */
    }
}