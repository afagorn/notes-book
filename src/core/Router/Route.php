<?php
declare(strict_types=1);

namespace core\Route;

use core\Exception\Route\RouteValidateException;
use http\Exception\InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

class Route
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var HTTPMethod
     */
    private HTTPMethod $method;

    /**
     * @var string
     */
    private string $controllerClass;

    /**
     * @var string
     */
    private string $action;

    /**
     * Route constructor.
     * @param string $name
     * @param string $path
     * @param HTTPMethod $method
     * @param string $controllerClass
     * @param string $action
     * @throws RouteValidateException
     */
    public function __construct(
        string $name,
        string $path,
        HTTPMethod $method,
        string $controllerClass,
        string $action
    ) {
        $this->setName($name);
        $this->setPath($path);
        $this->setMethod($method);
        $this->setControllerClass($controllerClass);
        $this->setAction($action);
    }

    /**
     * @return HTTPMethod
     */
    public function getMethod(): HTTPMethod
    {
        return $this->method;
    }

    /**
     * @return string
     */
    #[Pure] public function getMethodString(): string
    {
        return $this->method->getMethod();
    }

    /**
     * @param HTTPMethod $method
     */
    public function setMethod(HTTPMethod $method): void
    {
        $this->method = $method;
    }

    /**
     * @param string $name
     */
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $controllerClass
     */
    private function setControllerClass(string $controllerClass): void
    {
        if (!class_exists($controllerClass)) {
            throw new InvalidArgumentException("This controller doesn't exist");
        }

        $this->controllerClass = $controllerClass;
    }

    /**
     * @return string
     */
    public function getControllerClass(): string
    {
        return $this->controllerClass;
    }

    /**
     * @param string $path
     * @throws RouteValidateException
     */
    private function setPath(string $path): void
    {
        if(!$path = filter_var(
            $path,
            FILTER_VALIDATE_URL,
            FILTER_FLAG_PATH_REQUIRED
        )) {
            throw new RouteValidateException();
        }

        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $controllerAction
     * @throws RouteValidateException
     */
    public function setAction(string $controllerAction): void
    {
        if (!method_exists($this->controllerClass, $controllerAction)) {
            throw new RouteValidateException(sprintf(
                "This action %s don`t exist for controller %s",
                $controllerAction,
                $this->controllerClass
            ));
        }

        $this->action = $controllerAction;
    }
}
