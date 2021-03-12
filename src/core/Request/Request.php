<?php

namespace core\Request;

class Request implements IRequest
{
    /**
     * @var string
     */
    private string $method;

    /**
     * Содержит POST данные или если их нет, то GET
     * @var array
     */
    private array $parsedBody;

    /**
     * @var array
     */
    private array $parsedQuery;

    /**
     * @var array
     */
    private array $parsedPost;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var array
     */
    private array $parsedUrl;

    /**
     *
     */
    public function init()
    {
        $this->setMethod();
        $this->setUrl();
        $this->setParsedUrl();

        $this->setParsedPost();
        $this->setParsedQuery();
        $this->setParsedBody();
    }

    /**
     *
     */
    private function setMethod(): void
    {
        $this->method = mb_strtolower(trim($_SERVER['REQUEST_METHOD']));
    }

    /**
     *
     */
    private function setUrl()
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $this->url = sprintf(
            '%s://%s%s',
            $protocol,
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        );
    }

    /**
     *
     */
    private function setParsedPost()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($post)) {
            $post = file_get_contents('php://input');

            $jsonArray = json_decode($post, true);
            if(json_last_error() != JSON_ERROR_NONE) {
                $post = $jsonArray;
            }
        }

        $this->parsedPost = $post;
    }

    /**
     *
     */
    private function setParsedQuery()
    {
        $query = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($query)) {
            $query = [];
        }

        $this->parsedQuery = $query;
    }

    /**
     *
     */
    private function setParsedBody()
    {
        if(empty($body = $this->parsedPost)) {
            $body = $this->parsedQuery;
        }

        $this->parsedBody = $body;
    }

    /**
     *
     */
    private function setParsedUrl()
    {
        if(!is_array($parsedUrl = parse_url($this->url))) {
            $parsedUrl = [];
        }

        $this->parsedUrl = $parsedUrl;
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getParsedUrl(): array
    {
        return $this->parsedUrl;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}