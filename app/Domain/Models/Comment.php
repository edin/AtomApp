<?php

namespace App\Domain\Models;

use DateTimeImmutable;
use Atom\Database\Mapping\Mapping;
use Atom\Database\Mapping\DateTimeConverter;
use Atom\Database\Mapping\CurrentDateTimeProvider;
use App\Domain\Repositories\CommentRepository;

final class Comment
{
    public int $Id;
    public string $Comment;
    public int $PostId;
    public int $UserId;
    public DateTimeImmutable $CreatedAt;
    public DateTimeImmutable $UpdatedAt;

    public function getMapping(): Mapping
    {
        return Mapping::create(function (Mapping $map) {
            $map->table("comments");
            $map->setEntityClass(Comment::class);
            $map->setRepositoryClass(CommentRepository::class);

            $map->property("Id")->field("id")->primaryKey()->int();
            $map->property("Comment")->field("comment")->string(500);
            $map->property("PostId")->field("post_id")->int();
            $map->property("UserId")->field("user_id")->int();

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
