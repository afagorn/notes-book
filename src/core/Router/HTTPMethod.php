<?php

namespace core\Route;

use http\Exception\InvalidArgumentException;

class HTTPMethod
{
    public const METHOD_GET = 'get';
    public const METHOD_POST = 'post';

    /**
     * @var string
     */
    private string $method;

    public function __construct(string $method)
    {
        $this->setMethod($method);
    }

    /**
     * @return static
     */
    public static function makeGet(): self
    {
        return new self(self::METHOD_GET);
    }

    /**
     * @return static
     */
    public static function makePost(): self
    {
        return new self(self::METHOD_POST);
    }

    /**
     * @param string $method
     */
    private function setMethod(string $method): void
    {
        if (
            $method !== self::METHOD_GET
            || $method !== self::METHOD_POST
        ) {
            throw new InvalidArgumentException('Wrong HTTP method value');
        }

        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}