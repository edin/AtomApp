<?php

namespace App\Models;

final class User
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;

    public static function from($id, $first_name, $last_name, $email)
    {
        $user = new static();
        $user->id = $id;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        return $user;
    }
}
