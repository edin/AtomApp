<?php

namespace App;

use App\Controllers\AccountController;
use App\Controllers\HomeController;
use App\Middlewares\LogMiddleware;
use App\Models\UserRepository;
use Atom\Container\Container;
use Atom\Router\Router;

class Routes
{
    public function configureServices(Container $container)
    {
        $container->UserRepository    = \App\Models\UserRepository::class;
    }

    public function configure(Router $router)
    {
        $router->addGroup("/", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);

            $group->addRoute("GET", "", HomeController::class, "index")->withName("home");
            $group->addRoute("GET", "item", HomeController::class, "item");
            $group->addRoute("GET", "json", HomeController::class, "json");
            $group->addRoute("GET", "login", AccountController::class, "login");
            $group->addRoute("GET", "logout", AccountController::class, "logout");
        });

        $router->addGroup("/api", function (Router $group) {
            $group->addRoute("GET", "users", HomeController::class, "onGet");
            $group->addRoute("POST", "users", HomeController::class, "onPost");
            $group->addRoute("PUT", "users/{id}", HomeController::class, "onPut");
            $group->addRoute("PATCH", "users", HomeController::class, "onPatch");
            $group->addRoute("DELETE", "users", HomeController::class, "onDelete");
            $group->addRoute("OPTIONS", "users", HomeController::class, "onOptions");

            $group->addRoute("GET", "hello", function (UserRepository $users) {
                return $users->findAll();
            });
        });
    }
}
