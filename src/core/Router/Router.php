<?php
declare(strict_types=1);

namespace System\Router;

use core\Exception\Route\RoutePathNotFoundException;
use core\Exception\Route\RouteDuplicateException;
use core\Exception\Route\RouteValidateException;
use core\Request\IRequest;
use core\Route\HTTPMethod;
use core\Route\RouteCollection;
use core\Route\Route;
use JetBrains\PhpStorm\Pure;

class Router
{
    /**
     * @var RouteCollection
     */
    private RouteCollection $routeCollection;

    /**
     * @var IRequest
     */
    private IRequest $request;

    /**
     * Router constructor.
     * @param IRequest $request
     */
    #[Pure] public function __construct(IRequest $request)
    {
        $this->request = $request;
        $this->routeCollection = new RouteCollection();
    }

    /**
     * @param Route $route
     * @throws RouteDuplicateException
     */
    public function add(Route $route): void
    {
        if(array_key_exists($routeName = $route->getName(), $this->routeCollection)) {
            throw new RouteDuplicateException('This route name already exist');
        }

        $this->routeCollection->add($routeName, $route);
    }

    /**
     * @param string $name
     * @param string $path
     * @param string $controllerClass
     * @param string $action
     * @throws RouteDuplicateException
     * @throws RouteValidateException
     */
    public function addGet(string $name, string $path, string $controllerClass, string $action): void
    {
        $this->add(new Route(
            $name,
            $path,
            HTTPMethod::makeGet(),
            $controllerClass,
            $action
        ));
    }

    public static function addAPI(string $name, string $controller)
    {

    }

    /**
     * @throws RoutePathNotFoundException
     */
    public function run(): void
    {
        $path = $this->request->getUrl()->getPath() ?? '/';
        $currentRoute = null;

        /** @var Route $route */
        foreach ($this->routeCollection as $route) {
            if ($route->getPath() === $path) {
                $currentRoute = $route;
                break;
            }
        }

        if (!$currentRoute) {
            // TODO как правильно отдавать 404 в роутере?
            throw RoutePathNotFoundException::new($path);
        }

        //TODO Реализовать добавление аргументов через маркеры
        call_user_func([
            $currentRoute->getControllerClass(),
            $currentRoute->getAction()
        ]);
    }
}