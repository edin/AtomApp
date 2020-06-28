<?php

namespace App\Controllers\Admin;

use Atom\View\ViewInfo;
use App\Domain\Models\Category;
use App\Domain\Repositories\CategoryRepository;
use App\ViewModels\TableViewModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SortOrder
{
    public string $fieldName = "";
    public string $direction = "asc";
}

final class Field
{
    public string $fieldName;
    public string $title;
    public bool   $sortable = false;
}

final class FieldCollection
{
    private array $fields = [];

    public function add(Field $field): void
    {
        $this->fields[] = $field;
    }

    // public function 

}

final class SortCollection
{
    private array $order = [];

    public function add(SortOrder $order)
    {
        $this->order[$order->fieldName] = $order;
    }

    public function remove(SortOrder $order)
    {
        unset($this->order[$order->fieldName]);
    }

    public function removeBy(string $fieldName)
    {
        unset($this->order[$fieldName]);
    }

    public function fromString(string $order)
    {
        $parts = explode(",", $order);
        foreach ($parts as $part) {
            $subParts = explode(".", $part);
            $fieldName = $subParts[0] ?? "";
            $fieldOrder = $subParts[1] ?? "asc";
            if ($fieldOrder !== "desc") {
                $fieldOrder = "asc";
            }
            $orderBy = new SortOrder();
            $orderBy->fieldName = $fieldName;
            $orderBy->direction = $fieldOrder;
            $this->add($orderBy);
        }
    }

    public function items(): array
    {
        return $this->order;
    }

    public function getSortDirection(string $fieldName): string
    {
        if (isset($this->order[$fieldName])) {
            return $this->order[$fieldName]->direction;
        }
        return "";
    }
}


final class CategoryController
{
    private CategoryRepository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;
    private TableViewModel $viewModel;

    public function __construct(
        CategoryRepository $repository,
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $this->repository = $repository;
        $this->request = $request;
        $this->response = $response;
        $this->viewModel = new TableViewModel();
        //$this->viewModel->setViewPath("")
    }

    public function index(int $page = 1, ?string $orderBy = null)
    {
        $this->viewModel->setPage($page);
        $this->viewModel->setOrder($orderBy);

        $page = ($page > 0) ? $page : 1;
        $size = 10;
        $skip = ($page - 1) * $size;

        $count = $this->repository->query()->getRowCount();
        $query = $this->repository->query()->limit($size)->skip($skip);

        return new ViewInfo("admin/category/index", [
            "model" => $this->viewModel,
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
