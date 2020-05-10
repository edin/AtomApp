<?php

namespace App\Filters;

use Atom\Router\Action;
use Atom\Router\IActionFilter;

// TODO: Rewrite using Middleware
// class ActionFilter implements IActionFilter
// {
//     public function filter(Action $action)
//     {
//         return [
//             "message" => "Hello from action filter",
//             "controller" => $action->getRoute()->getActionHandler()->getController(),
//             "method" => $action->getRoute()->getActionHandler()->getMethodName()
//         ];
//     }
// }
