<?php

namespace App\Models;

use Atom\Database\Mapping\Mapping;

final class User
{
    public int $Id;
    public string $FirstName;
    public string $LastName;
    public string $Email;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("users");
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("FirstName")->field("first_name")->string();
            $map->property("LastName")->field("last_name")->string();
            $map->property("Email")->field("email")->string();
        });
    }
}
