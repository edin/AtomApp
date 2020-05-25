<?php

namespace App\Models\Repositories;

use App\Models\Comment;
use Atom\Database\Database;
use Atom\Database\Repository;

final class CommentRepository extends Repository
{
    public function __construct(Database $database)
    {
        parent::__construct($database, Comment::class);
    }
}
