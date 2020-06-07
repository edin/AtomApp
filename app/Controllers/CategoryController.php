<?php

namespace App\Controllers;

use App\Models\Repositories\CategoryRepository;

final class CategoryController
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
