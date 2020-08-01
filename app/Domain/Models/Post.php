<?php

namespace App\Domain\Models;

use App\Domain\Repositories\PostRepository;
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
    public ?Category $Category = null;

    public string $Author = "";

    public DateTimeImmutable $CreatedAt;
    public DateTimeImmutable $UpdatedAt;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("posts");
            $map->setEntityClass(Post::class);
            $map->setRepositoryClass(PostRepository::class);
            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("Title")->field("title")->string(50);
            $map->property("Content")->field("content")->string(50);

            $map->property("CategoryId")->field("category_id")->int();
            $map->property("Author")->field("author")->string(100);

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
