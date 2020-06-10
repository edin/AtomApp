<?php

namespace App;

use Atom\Router\Router;
use Atom\Router\RouteBuilder;
use App\Models\Repositories\UserRepository;
use App\Controllers\ApiController;
use App\Middlewares\LogMiddleware;
use App\Controllers\HomeController;
use App\Controllers\AccountController;
use App\Controllers\CategoryController;
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

            // Category Controller
            $group->addGroup("/category", function (Router $group) {
                $group->setController(CategoryController::class);
                $group->get("",  "index");

                $group->get("create", "create");
                $group->post("create", "create");

                $group->get("edit/{id}", "edit");
                $group->post("edit/{id}", "edit");

                $group->get("delete/{id}", "delete");
                $group->post("delete/{id}", "delete");
            });
        });

        $router->attachTo("/api", RouteBuilder::fromController(ApiController::class));

        $router->get("/api/users-all", function (UserRepository $users) {
            return $users->findAll();
        });
    }
}
