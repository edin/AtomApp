<?php

namespace App\Controllers\Admin;

use App\Domain\Repositories\PostRepository;
use Atom\View\ViewInfo;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PostController
{
    private PostRepository $repository;
    private ServerRequestInterface $request;
    private ResponseInterface $response;

    public function __construct(
        PostRepository $repository,
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
        $size = 5;
        $skip = ($page - 1) * $size;

        $count = $this->repository->query()->getRowCount();
        $query = $this->repository->query()->limit($size)->skip($skip);

        return new ViewInfo("admin/post/index", [
            "models" => $query->findAll(),
            "page" => $page,
            "count" => $count
        ]);
    }
}
