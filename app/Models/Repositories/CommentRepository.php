<?php

namespace App\Models\Repositories;

use App\Models\Comment;
use Atom\Database\Repository;

final class CommentRepository extends Repository
{
    protected string $entityType = Comment::class;
}
