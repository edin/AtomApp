<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Post;
use Atom\Database\Repository;

final class PostRepository extends Repository
{
    protected string $entityType = Post::class;
}
