<?php

use core\App;
use core\Request\Request;
use System\Route\Router;

$app = new App(
    $request = new Request(),
    new Router($request)
);

$app->run();