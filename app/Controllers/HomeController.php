<?php

namespace App\Controllers;

use App\Messages\FormPostMessage;
use App\Models\UserRepository;
use Atom\View\ViewInfo;
use Atom\Container\Container;
use Psr\Http\Message\ServerRequestInterface;

final class HomeController
{
    private $UserRepository;
    private $Request;
    private $Container;

    public function __construct(
        UserRepository $userRepository,
        ServerRequestInterface $request,
        Container $container
    ) {
        $this->UserRepository = $userRepository;
        $this->Request = $request;
        $this->Container = $container;
    }

    final public function index($id = 0, FormPostMessage $post)
    {
        return new ViewInfo(
            'home/index',
            [
                'items' => $this->UserRepository->findAll(),
                'post' => $post
            ]
        );
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
