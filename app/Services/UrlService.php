<?php

namespace App\Services;

use Atom\Router\Router;

final class UrlService
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getBaseUrl(): string
    {
        return "";
    }

    public function url(string $path, array $params = [])
    {
        //1. find route by name
        //2. us

    }
}
