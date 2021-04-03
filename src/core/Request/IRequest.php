<?php

namespace core\Request;

use core\Route\HTTPMethod;

interface IRequest
{
    /**
     * @return void
     */
    public function init(): void;

    /**
     * @return array
     */
    public function getParsedBody(): array;

    /**
     * @return array
     */
    public function getParsedPost(): array;

    /**
     * @return array
     */
    public function getParsedQuery(): array;

    /**
     * @return Url
     */
    public function getUrl(): Url;

    /**
     * @return HTTPMethod
     */
    public function getHTTPMethod(): HTTPMethod;
}
