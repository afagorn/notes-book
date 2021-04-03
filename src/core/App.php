<?php
namespace core;

use core\Request\IRequest;
use System\Route\Router;

class App
{
    /**
     * @var IRequest
     */
    private IRequest $request;

    /**
     * @var Router
     */
    private Router $route;

    /**
     * App constructor.
     * @param IRequest $request
     * @param Router $route
     */
    public function __construct(IRequest $request, Router $route)
    {
        $this->request = $request;
        $this->route = $route;
    }

    public function run()
    {
        $this->request->init();
        $this->route->run();
    }
}