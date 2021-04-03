<?php
//TODO Как создавать объект Роутер???
$route = new \System\Router\Router();
//$route->addAPI('note.api', \Controller\API\NoteAPIController::class);

//TODO Реализовать добавление аргументов через маркеры: /user/{id}

$route->addGet(
    'home',
    '/',
    \Controller\HomeController::class,
    'index'
);
