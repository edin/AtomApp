<?php

namespace App\Controllers\Admin;

use Atom\View\ViewInfo;
use App\Domain\Models\Category;
use App\Domain\Repositories\CategoryRepository;
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

    public function index(int $page = 1, ?string $orderBy = null)
    {
        $page = ($page > 0) ? $page : 1;
        $size = 10;
        $skip = ($page - 1) * $size;

        $count = $this->repository->query()->getRowCount();
        $query = $this->repository->query()->limit($size)->skip($skip);

        return new ViewInfo("admin/category/index", [
            "models" => $query->findAll(),
            "page" => $page,
            "count" => $count
        ]);
    }

    public function isPost()
    {
        return ($this->request->getMethod() == "POST");
    }

    public function returnToIndex()
    {
        return $this->response->withHeader("Location", "/public/admin/category")->withStatus(200);
    }

    public function create(Category $model)
    {
        if ($this->isPost()) {
            $this->repository->save($model);
            return $this->returnToIndex();
        }

        return new ViewInfo("admin/category/edit", [
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

        return new ViewInfo("admin/category/edit", [
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

        return new ViewInfo("admin/category/delete", [
            "model" => $model
        ]);
    }
}
