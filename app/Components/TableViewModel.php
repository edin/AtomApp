<?php

namespace App\Components;

use App\Services\UrlService;
use Atom\Collections\PagedCollection;
use Atom\Database\Repository;
use Atom\View\ViewInfo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class TableViewModel
{
    private int $page = 1;
    private string $viewPath;
    private ?string $order = null;
    private ?string $filterBy = null;
    private Repository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;
    private UrlService $url;

    public ?object $model = null;
    public ?PagedCollection $items = null;

    public function __construct(
        ServerRequestInterface $request,
        ResponseInterface $response,
        UrlService $url,
        Repository $repository,
        $viewPath
    ) {
        $this->request = $request;
        $this->response = $response;
        $this->url = $url;
        $this->repository = $repository;
        $this->viewPath = $viewPath;
    }

    public function returnToIndex()
    {
        return $this->response
            ->withHeader("Location", $this->url->to("/admin/category"))
            ->withStatus(200);
    }

    public function addField($column): void
    {
        $this->columns[] = $column;
    }

    public function setPage(int $page)
    {
        $this->page = $page;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setOrder(?string $order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setFilterBy(?string $filterBy)
    {
        $this->filterBy = $filterBy;
    }

    public function getFilterBy()
    {
        return $this->filterBy;
    }

    public function isPost()
    {
        return ($this->request->getMethod() == "POST");
    }

    public function getCollection()
    {
        //TODO: Apply filtering
        return $this->repository->query()->toPagedCollection($this->page, 10);
    }

    public function index()
    {
        return $this->getView("index", $this->getCollection());
    }

    public function create($model)
    {
        $this->model = $model;
        if ($this->isPost()) {
            $this->repository->save($model);
            return $this->returnToIndex();
        }
        return $this->getView("edit");
    }

    public function edit(int $id, $model)
    {
        if ($this->isPost()) {
            $this->repository->save($model);
            return $this->returnToIndex();
        } else {
            $model = $this->repository->findById($id);
        }
        $this->model = $this->repository->findById($id);
        return $this->getView("edit");
    }

    public function delete(int $id)
    {
        if ($this->isPost()) {
            $this->repository->removeById($id);
            return $this->returnToIndex();
        }
        $this->model = $this->repository->findById($id);
        return $this->getView("delete");
    }

    private function getView($name, $collection = null)
    {
        return new ViewInfo("{$this->viewPath}/$name", [
            "model" => $this,
            "collection" => $collection
        ]);
    }
}
