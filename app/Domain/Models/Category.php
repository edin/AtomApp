<?php

namespace App\Domain\Models;

use Atom\Database\EntityCollection;
use Atom\Database\Mapping\Mapping;
use Atom\Validation\Validation;

final class Category
{
    public ?int $Id = null;
    public string $Title = "";
    public bool $IsActive = false;
    public string $Description = "";
    public string $ImageUrl = "";
    // public ?int $ParentId = null;
    // public ?Category $Parent = null;
    // public EntityCollection $Categories;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("categories");
            //$map->setEntity(Category::class);
            //$map->setRepository(UserRepository::class);
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("Title")->field("title")->string(50);
            $map->property("Description")->field("description")->string(500);
            $map->property("ImageUrl")->field("image_url")->string(100);
            //$map->property("ParentId")->field("parent_id")->int();
            $map->property("IsActive")->field("is_active")->int();

            //$map->relation("Parent")->belongsTo(Category::class, "ParentId", "Id");
            //$map->relation("Categories")->hasMany(Category::class, "ParentId", "Id");
        });
    }

    // public function getValidation(): Validation
    // {
    //     return Validation::create(function (Validation $rule) {
    //         $rule->Title->required()->trim()->length(1, 100);
    //     });
    // }
}
