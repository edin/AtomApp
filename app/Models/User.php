<?php

namespace App\Models;

use Atom\Database\Mapping\Mapping;

final class User
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $email;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("users");
            $map->property("id")->primaryKey()->int();
            $map->property("first_name")->string();
            $map->property("last_name")->string();
            $map->property("email")->string();
        });
    }
}
