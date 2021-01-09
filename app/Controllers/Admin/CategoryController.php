<?php

namespace App\Controllers\Admin;

use Atom\View\ViewInfo;
use App\Domain\Models\Category;
use App\Domain\Repositories\CategoryRepository;
use App\Services\UrlService;
use App\ViewModels\TableViewModel;
use Atom\Collections\PagedCollection;
use Atom\Container\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CategoryController
{
    private CategoryRepository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;
    private TableViewModel $viewModel;
    private UrlService $url;

    public function __construct(
        CategoryRepository $repository,
        ServerRequestInterface $request,
        ResponseInterface $response,
        UrlService $url
    ) {
        $this->url = $url;
        $this->repository = $repository;
        $this->request = $request;
        $this->response = $response;
        $this->viewModel = new TableViewModel();
    }

    public function index(int $page = 1, ?string $orderBy = null, ?string $filterBy = null)
    {
        $this->viewModel->setPage($page);
        $this->viewModel->setOrder($orderBy);
        $collection = $this->repository->query()->toPagedCollection($page, 10);

        return new ViewInfo("admin/category/index", [
            "model" => $this->viewModel,
            "collection" => $collection
        ]);
    }

    public function isPost()
    {
        return ($this->request->getMethod() == "POST");
    }

    public function returnToIndex()
    {
        return $this->response
            ->withHeader("Location", $this->url->to("/admin/category"))
            ->withStatus(200);
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
