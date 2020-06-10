<?php

namespace App\Controllers;

use App\Models\Repositories\CategoryRepository;
use Atom\View\ViewInfo;

final class CategoryController
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        //TODO: Aplly filters
        return new ViewInfo("category/index", [
            "models" => $this->repository->findAll()
        ]);
    }

    public function create()
    {
        //TODO: Save or update then redirect to index
        return new ViewInfo("category/edit", [
            "models" => $this->repository->findAll()
        ]);
    }

    public function edit()
    {
        //TODO: Save or update then redirect to index
        return new ViewInfo("category/edit", [
            "models" => $this->repository->findAll()
        ]);
    }

    public function delete(int $id)
    {
        $model = $this->repository->findById($id);
        return new ViewInfo("category/delete", [
            "model" => $model
        ]);
    }
}
