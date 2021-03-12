<?php

namespace core\Request;

interface IRequest
{
    public function init();

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
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return array
     */
    public function getParsedUrl(): array;

    /**
     * @return string
     */
    public function getMethod(): string;
}
