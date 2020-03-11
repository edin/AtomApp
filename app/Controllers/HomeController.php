<?php

namespace App\Controllers;

use Atom\Router\Route;
use Atom\View\ViewInfo;
use App\Models\UserRepository;
use App\Messages\FormPostMessage;

final class HomeController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    final public function index($id = 0, FormPostMessage $post, Route $route)
    {
        return new ViewInfo('home/index', [
            'items' => $this->userRepository->findAll(),
            'post' => $post,
            'route' => $route
        ]);
    }

    final public function json(UserRepository $repository)
    {
        return $repository->findAll();
    }

    final public function item()
    {
        $item = new \stdClass;
        $item->title = "Item";
        return new ViewInfo('home/item', ['item' => $item]);
    }

    final public function onGet(UserRepository $repository)
    {
        return $repository->findAll();
    }

    final public function onPost()
    {
        return ["result" => "Executed onPost method."];
    }

    final public function onPut($id = 0)
    {
        return ["result" => "Executed onPut method.", "id" => $id];
    }

    final public function onPatch()
    {
        return ["result" => "Executed onPatch method."];
    }

    final public function onDelete()
    {
        return ["result" => "Executed onDelete method."];
    }

    final public function onOptions()
    {
        return ["result" => "Executed onOptions method."];
    }
}
