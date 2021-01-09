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
            new Item("Database Crud", $this->url->to("/admin/category")),
            new Item("JSON Response", $this->url->to("/api/users")),
            new Item("JSON Validation Result", $this->url->to("/validation")),
            new Item("Router", $this->url->to("/router")),
            new Item("Container Component Registry", $this->url->to("/container")),
        ];
    }

    public function router()
    {
        return new ViewInfo('home/router');
    }

    public function container()
    {
        return new ViewInfo('home/container');
    }
}
