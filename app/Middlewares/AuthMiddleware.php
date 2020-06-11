<?php

namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

final class AuthMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //TODO: Check if user is logged in
        $path = $request->getUri()->getPath();
        $result =  $handler->handle($request);
        return $result->withAddedHeader("X-Path", $path);
    }
}
