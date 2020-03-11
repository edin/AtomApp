<?php

namespace App;

use Atom\Router\Router;
use App\Models\UserRepository;
use App\Middlewares\LogMiddleware;
use App\Controllers\HomeController;
use App\Controllers\AccountController;
use App\Filters\ActionFilter;

class Routes
{
    public function configure(Router $router)
    {
        $router->addGroup("/", function (Router $group) {
            $group->addMiddleware(LogMiddleware::class);
            $group->get("", HomeController::class, "index")->withName("home");
            $group->get("item", HomeController::class, "item");
            $group->get("json", HomeController::class, "json");
            $group->get("login", AccountController::class, "login");
            $group->get("logout", AccountController::class, "logout");
            $group->get("filter", HomeController::class, "index")
                ->addActionFilter(ActionFilter::class);
        });

        $router->addGroup("/api", function (Router $group) {
            $group->get("users", HomeController::class, "onGet");
            $group->post("users", HomeController::class, "onPost");
            $group->put("users/{id}", HomeController::class, "onPut");
            $group->patch("users", HomeController::class, "onPatch");
            $group->delete("users", HomeController::class, "onDelete");
            $group->options("users", HomeController::class, "onOptions");

            $group->get("users-all", function (UserRepository $users) {
                return $users->findAll();
            });
        });
    }
}
