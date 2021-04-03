<?php
declare(strict_types=1);

namespace core\Request;

use core\Route\HTTPMethod;
use JetBrains\PhpStorm\Pure;

/**
 * Class Request
 * @package core\Request
 */
class Request implements IRequest
{
    /**
     * @var HTTPMethod
     */
    private HTTPMethod $HTTPMethod;

    /**
     * Содержит POST данные или если их нет, то GET
     * @var array
     */
    private array $parsedBody;

    /**
     * @var array
     */
    private array $parsedPost;

    /**
     * @var array
     */
    private array $parsedQuery;

    /**
     * @var Url
     */
    private Url $url;

    /**
     * @return void
     */
    public function init(): void
    {
        $this->HTTPMethod = $this->setHTTPMethod();
        $this->url = $this->makeUrl();
        $this->parsedPost = $this->parsePost();
        $this->parsedQuery = $this->parseQuery();
        $this->parsedBody = $this->parseBody();
    }

    /**
     * @return HTTPMethod
     */
    private function setHTTPMethod(): HTTPMethod
    {
        return new HTTPMethod(
            mb_strtolower(trim($_SERVER['REQUEST_METHOD']))
        );
    }

    /**
     * @return Url
     */
    private function makeUrl(): Url
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $url = sprintf(
            '%s://%s%s',
            $protocol,
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        );

        return new Url($url);
    }

    /**
     * @return array
     */
    private function parsePost(): array
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($post)) {
            $post = file_get_contents('php://input');

            $jsonArray = json_decode($post, true);
            if(json_last_error() != JSON_ERROR_NONE) {
                $post = $jsonArray;
            }
        }

        return $post;
    }

    /**
     * @return array
     */
    #[Pure] private function parseQuery(): array
    {
        $query = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($query)) {
            $query = [];
        }

        return $query;
    }

    /**
     * @return array
     */
    private function parseBody(): array
    {
        if(empty($parsedBody = $this->parsedPost)) {
            $parsedBody = $this->parsedQuery;
        }

        return $parsedBody;
    }

    /**
     * @return array
     */
    public function getParsedBody(): array
    {
        return $this->parsedBody;
    }

    /**
     * @return array
     */
    public function getParsedPost(): array
    {
        return $this->parsedPost;
    }

    /**
     * @return array
     */
    public function getParsedQuery(): array
    {
        return $this->parsedQuery;
    }

    /**
     * @return HTTPMethod
     */
    public function getHTTPMethod(): HTTPMethod
    {
        return $this->HTTPMethod;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }
}