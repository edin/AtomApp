<?php

namespace App;

use Atom\Router\Router;
use Atom\Router\RouteBuilder;
use App\Domain\Repositories\UserRepository;
use App\Controllers\ApiController;
use App\Middlewares\LogMiddleware;
use App\Controllers\HomeController;
use App\Controllers\AccountController;
use App\Controllers\Admin\CategoryController;
use App\Controllers\Admin\PostController;
use App\Controllers\ValidationController;
use App\Controllers\Link\LinkController;
use App\Middlewares\AuthMiddleware;

class Routes
{
    public function configure(Router $router)
    {
        $router->addGroup("/", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);
            $group->addMiddleware(AuthMiddleware::class);
            $group->setController(HomeController::class);

            $group->get("", "index");
            $group->get("router");
            $group->get("container");
            $group->get("model");
            $group->get("validation", [ValidationController::class, "index"]);
            $group->attach(RouteBuilder::fromController(AccountController::class));
        });

        $router->addGroup("/admin", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);

            $group->addGroup("/admin/category", function (Router $group) {
                $group->setController(CategoryController::class);
                $group->get("",  "index");
                $group->getOrPost("create");
                $group->getOrPost("edit/{id}", "edit");
                $group->getOrPost("delete/{id}", "delete");
            });
        });

        $this->attach($router, "/api", ApiController::class);
        $this->attach($router, "/", LinkController::class);

        $router->get("/api/users-all", function (UserRepository $users) {
            return $users->findAll();
        });
    }

    private function attach($router, $path, $controller)
    {
        $router->attachTo($path,  RouteBuilder::fromController($controller));
    }
}
