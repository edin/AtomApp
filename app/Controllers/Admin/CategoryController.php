<?php

namespace App\Controllers\Admin;

use App\Components\TableViewModel;
use App\Domain\Models\Category;
use App\Domain\Repositories\CategoryRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\UrlService;

final class CategoryController
{
    private CategoryRepository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;
    private UrlService $url;
    private TableViewModel $viewModel;

    public function __construct(
        CategoryRepository $repository,
        ServerRequestInterface $request,
        ResponseInterface $response,
        UrlService $url,
        int $page = 1
    ) {
        $this->url = $url;
        $this->repository = $repository;
        $this->request = $request;
        $this->response = $response;
        $this->viewModel = new TableViewModel($request, $response, $url, $repository, "admin/category");
        $this->viewModel->setPage($page);
    }

    public function index(?string $orderBy = null, ?string $filterBy = null)
    {
        $this->viewModel->setOrder($orderBy);
        $this->viewModel->setFilterBy($filterBy);
        return $this->viewModel->index();
    }

    public function create(Category $model)
    {
        return $this->viewModel->create($model);
    }

    public function edit(int $id, Category $model)
    {
        return $this->viewModel->edit($id, $model);
    }

    public function delete(int $id)
    {
        return $this->viewModel->delete($id);
    }
}
