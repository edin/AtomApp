<?php

namespace App\Domain\Models;

use DateTimeImmutable;
use Atom\Database\Mapping\Mapping;
use Atom\Database\Mapping\DateTimeConverter;
use Atom\Database\Mapping\CurrentDateTimeProvider;

final class Post
{
    public int $Id;
    public string $Title;
    public string $Content;

    public int $CategoryId;
    public Category $Category;

    public int $AuthorId;
    public ?User $Author;

    public DateTimeImmutable $CreatedAt;
    public DateTimeImmutable $UpdatedAt;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("posts");
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("Title")->field("title")->string(50);
            $map->property("Content")->field("content")->string(50);

            $map->property("CategoryId")->field("category_id")->int();
            $map->property("AuthorId")->field("author_id")->int();

            $map->property("CreatedAt")->field("created_at")->date()
                ->excludeInUpdate()
                ->withValueProvider(CurrentDateTimeProvider::class)
                ->withConverter(DateTimeConverter::class);

            $map->property("UpdatedAt")->field("updated_at")->date()
                ->withValueProvider(CurrentDateTimeProvider::class)
                ->withConverter(DateTimeConverter::class);
        });
    }
}
