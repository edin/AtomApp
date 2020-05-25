<?php

namespace App\Models;

use DateTimeImmutable;
use Atom\Database\Mapping\Mapping;
use Atom\Database\Mapping\DateTimeConverter;
use Atom\Database\Mapping\CurrentDateTimeProvider;

final class User
{
    public int    $Id;
    public string $FirstName;
    public string $LastName;
    public string $Email;
    public string $PasswordHash;
    public DateTimeImmutable $CreatedAt;
    public DateTimeImmutable $UpdatedAt;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("users");
            //$map->setEntity(User::class);
            //$map->setRepository(UserRepository::class)
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("FirstName")->field("first_name")->string(50);
            $map->property("LastName")->field("last_name")->string(50);
            $map->property("Email")->field("email")->string(100);
            $map->property("PasswordHash")->field("password_hash")->string(255)->excludeInSelect();

            $map->property("CreatedAt")->field("created_at")->date()
                ->excludeInUpdate()
                ->withValueProvider(CurrentDateTimeProvider::class)
                ->withConverter(DateTimeConverter::class);

            $map->property("UpdatedAt")->field("updated_at")->date()
                ->withValueProvider(CurrentDateTimeProvider::class)
                ->withConverter(DateTimeConverter::class) ;
        });
    }
}
