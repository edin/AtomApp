<?php

namespace App\Services;

use Atom\Router\Router;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UrlService
{
    private Router $router;
    private ServerRequestInterface $serverRequest;

    public function __construct(ServerRequestInterface $request, Router $router)
    {
        $this->serverRequest = $request;
        $this->router = $router;
    }

    public function getBaseUrl(): string
    {
        $uri = $this->serverRequest->getUri();
        $host = $uri->getHost();
        $scheme = $uri->getScheme();
        $result = "$scheme://$host";
        return $result;
    }

    public function to(string $path, array $params = [])
    {
        $baseUrl = $this->getBaseUrl();
        $url = rtrim($baseUrl, "/") . "/" . ltrim($path, "/");

        $tags = [];
        foreach ($params as $key => $value) {
            $tags["{{$key}}"] = $value;
        }

        $url = strtr($url, $tags);
        return $url;
    }
}
