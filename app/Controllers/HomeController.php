<?php

namespace App\Controllers;

use Atom\Router\Route;
use Atom\View\ViewInfo;
use App\Messages\FormPostMessage;
use App\Services\UrlService;

class Item
{
    public $title = "";
    public $url = "";
    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }
}

final class HomeController
{
    private UrlService $url;

    public function __construct(UrlService $url)
    {
        $this->url = $url;
    }

    public function index(FormPostMessage $post, Route $route, $id = 0)
    {
        return new ViewInfo('home/index', [
            "items" => $this->getItems()
        ]);
    }

    public function getItems()
    {
        return [
            new Item("Login View", $this->url->to("/login")),
            new Item("Category Crud", $this->url->to("/admin/category")),
            new Item("Api", $this->url->to("/api/users")),
        ];
    }

    // final public function json(UserRepository $repository)
    // {
    //     return $repository->findAll();
    // }

    // final public function item()
    // {
    //     $item = new \stdClass;
    //     $item->title = "Item";
    //     return new ViewInfo('home/item', ['item' => $item]);
    // }

    // final public function onGet(UserRepository $repository)
    // {
    //     return $repository->findAll();
    // }
}
