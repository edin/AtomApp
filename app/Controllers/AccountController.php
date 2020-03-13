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
     * @Get("logout-route")
     */
    final public function logout()
    {
        return new ViewInfo('account/logout');
    }
}
