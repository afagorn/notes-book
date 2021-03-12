<?php

namespace Controller\API;

abstract class APIController
{
    abstract public function index(Re);

    abstract public function create();

    abstract public function update();

    abstract public function remove();
}
