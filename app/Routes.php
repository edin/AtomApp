<?php

namespace App;

use Atom\Router\Router;
use Atom\Router\RouteBuilder;
use App\Models\UserRepository;
use App\Controllers\ApiController;
use App\Middlewares\LogMiddleware;
use App\Controllers\HomeController;
use App\Controllers\AccountController;
use App\Controllers\ValidationController;

class Routes
{
    public function configure(Router $router)
    {
        $router->addGroup("/", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);
            $group->setController(HomeController::class);

            $group->get("", "index")->withName("home");
            $group->get("item", "item");
            $group->get("json", "json");
            $group->get("filter", "index");
            $group->get("validation", ValidationController::class, "index");

            $group->attach(RouteBuilder::fromController(AccountController::class));
        });

        $router->attachTo("/api", RouteBuilder::fromController(ApiController::class));

        $router->get("/api/users-all", function (UserRepository $users) {
            return $users->findAll();
        });
    }
}
