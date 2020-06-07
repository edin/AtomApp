<?php

namespace App\Controllers;

use App\Models\Repositories\PostRepository;

final class PostController
{
    private PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }
}
