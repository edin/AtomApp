<?php

namespace App\Models\Repositories;

use App\Models\Post;
use Atom\Database\Database;
use Atom\Database\Repository;
use Atom\Database\Query\Operator;

final class PostRepository extends Repository
{
    public function __construct(Database $database)
    {
        parent::__construct($database, Post::class);
    }
}
