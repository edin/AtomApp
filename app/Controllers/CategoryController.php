<?php

namespace App\Controllers;

use App\Domain\Models\Category;
use App\Domain\Repositories\CategoryRepository;
use Atom\View\ViewInfo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CategoryController
{
    private CategoryRepository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;

    public function __construct(
        CategoryRepository $repository,
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $this->repository = $repository;
        $this->request = $request;
        $this->response = $response;
    }

    public function index()
    {
        //TODO: Aplly filters
        return new ViewInfo("category/index", [
            "models" => $this->repository->findAll()
        ]);
    }

    public function isPost()
    {
        return ($this->request->getMethod() == "POST");
    }

    public function returnToIndex()
    {
        return $this->response->withHeader("Location", "/public/category")->withStatus(200);
    }

    public function create(Category $model)
    {
        if ($this->isPost()) {
            $this->repository->save($model);
            return $this->returnToIndex();
        }

        return new ViewInfo("category/edit", [
            "model" => $model
        ]);
    }

    public function edit(int $id, Category $model)
    {
        if ($this->isPost()) {
            $this->repository->save($model);
            return $this->returnToIndex();
        } else {
            $model = $this->repository->findById($id);
        }

        return new ViewInfo("category/edit", [
            "model" => $model
        ]);
    }

    public function delete(int $id)
    {
        if ($this->isPost()) {
            $this->repository->removeById($id);
            return $this->returnToIndex();
        }

        $model = $this->repository->findById($id);

        return new ViewInfo("category/delete", [
            "model" => $model
        ]);
    }
}
