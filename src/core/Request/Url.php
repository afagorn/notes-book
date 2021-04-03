<?php
declare(strict_types=1);

namespace core\Request;

use http\Exception\InvalidArgumentException;

/**
 * Class Url
 * @package core\Request
 */
class Url
{
    /**
     * @var string
     */
    private string $stringUrl;

    /**
     * @var string
     */
    private string $scheme;

    /**
     * @var string
     */
    private string $host;

    /**
     * @var string|null
     */
    private ?string $port = null;

    /**
     * @var string|null
     */
    private ?string $user = null;

    /**
     * @var string|null
     */
    private ?string $pass = null;

    /**
     * @var string|null
     */
    private ?string $query = null;

    /**
     * @var string|null
     */
    private ?string $path = null;

    /**
     * @var string|null
     */
    private ?string $fragment = null;

    /**
     * Url constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->parse($url);
    }

    /**
     * @param string $url
     * @return void
     */
    public function parse(string $url): void
    {
        if(!is_array($data = parse_url($url))) {
            throw new InvalidArgumentException('Incorrect url');
        }

        if(empty($data['host']) || empty($data['scheme'])) {
            throw new InvalidArgumentException(sprintf(
                'Host and scheme is required for url %s',
                $url
            ));
        }

        $this->setStringUrl($url);
        $this->setScheme($data['scheme']);
        $this->setHost($data['host']);
        $this->setPort($data['port'] ?? null);
        $this->setUser($data['user'] ?? null);
        $this->setPass($data['pass'] ?? null);
        $this->setQuery($data['query'] ?? null);
        $this->setPath($data['path'] ?? null);
        $this->setFragment($data['fragment'] ?? null);
    }

    /**
     * @param string $stingUrl
     */
    private function setStringUrl(string $stingUrl): void
    {
        $this->stringUrl = $stingUrl;
    }

    /**
     * @return string
     */
    public function getStringUrl(): string
    {
        return $this->stringUrl;
    }

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @param string $scheme
     */
    private function setScheme(string $scheme): void
    {
        $this->scheme = $scheme;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    private function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string|null
     */
    public function getPort(): ?string
    {
        return $this->port;
    }

    /**
     * @param string|null $port
     */
    private function setPort(?string $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string|null $user
     */
    private function setUser(?string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @param string|null $pass
     */
    private function setPass(?string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     */
    private function setQuery(?string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     */
    private function setPath(?string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string|null
     */
    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    /**
     * @param string|null $fragment
     */
    private function setFragment(?string $fragment): void
    {
        $this->fragment = $fragment;
    }
}