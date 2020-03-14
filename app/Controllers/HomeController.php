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
}
