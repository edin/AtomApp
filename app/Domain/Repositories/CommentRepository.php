<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Comment;
use Atom\Database\Repository;

final class CommentRepository extends Repository
{
    protected string $entityType = Comment::class;
}
