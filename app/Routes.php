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

        $router->addGroup("/admin", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);

            $group->addGroup("/admin/category", function (Router $group) {
                $group->setController(CategoryController::class);
                $group->get("",  "index");

                $group->getOrPost("create", "create");
                $group->getOrPost("edit/{id}", "edit");
                $group->getOrPost("delete/{id}", "delete");
            });


            $group->addGroup("/admin/post", function (Router $group) {
                $group->setController(PostController::class);
                $group->get("",  "index");

                $group->getOrPost("create", "create");
                $group->getOrPost("edit/{id}", "edit");
                $group->getOrPost("delete/{id}", "delete");
            });
        });


        $router->attachTo("/api", RouteBuilder::fromController(ApiController::class));
        $router->attachTo("/", RouteBuilder::fromController(LinkController::class));

        $router->get("/api/users-all", function (UserRepository $users) {
            return $users->findAll();
        });
    }
}
