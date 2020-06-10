<?php

namespace App\Controllers;

use Atom\View\ViewInfo;

final class AccountController
{
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
