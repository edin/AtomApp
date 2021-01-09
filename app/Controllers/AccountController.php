<?php

namespace App\Controllers;

use App\ViewModels\PageViewModel;
use Atom\Container\Container;
use Atom\View\ViewInfo;

final class AccountController
{
    public function __construct(Container $container)
    {
        $container->page->containerClass = "center-verticaly";
    }

    /**
     * @Get("login")
     */
    final public function login()
    {
        return new ViewInfo('account/login');
    }

    /**
     * @Get("logout")
     */
    final public function logout()
    {
        return new ViewInfo('account/logout');
    }

    /**
     * @Get("remind")
     */
    final public function remind()
    {
        return new ViewInfo('account/remind');
    }
}
