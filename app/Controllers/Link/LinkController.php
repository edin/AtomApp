<?php

namespace App\Controllers\Link;

use App\ViewModels\PageViewModel;
use Atom\Container\Container;
use Atom\View\ViewInfo;

final class LinkController
{
    private PageViewModel $model;

    public function __construct(Container $container)
    {
        $this->model = $container->page;
    }

    /**
     * @Get("link")
     */
    final public function actionLink()
    {
        $this->model->currentPage = "link";
        return new ViewInfo('link/link');
    }

    /**
     * @Get("zelda")
     */
    final public function actionZelda()
    {
        $this->model->currentPage = "zelda";
        return new ViewInfo('link/zelda');
    }
}
