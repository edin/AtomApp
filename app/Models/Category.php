<?php

namespace App\Models;

use Atom\Database\EntityCollection;
use Atom\Database\Mapping\Mapping;

final class Category
{
    public int $Id;
    public string $Title;
    public string $Descripion;
    public string $ImageUrl;
    public ?int $ParentId;
    public ?Category $Parent;
    public EntityCollection $Categories;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("categories");
            //$map->setEntity(Category::class);
            //$map->setRepository(UserRepository::class)
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("Title")->field("title")->string(50);
            $map->property("Descripion")->field("description")->string(50);
            $map->property("ImageUrl")->field("image_url")->string(100);
            $map->property("ParentId")->field("parent_id")->int(255);

            //$map->relation("Parent")->belongsTo(Category::class, "ParentId", "Id");
            //$map->relation("Categories")->hasMany(Category::class, "ParentId", "Id");
        });
    }
}
