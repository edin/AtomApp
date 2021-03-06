<?php

namespace App\Controllers;

use App\Domain\Repositories\UserRepository;
use App\Domain\Models\User;

final class ApiController
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @Get("users")
     */
    final public function onGet(int $limit = 2)
    {
        $query = $this->repository->query()->limit($limit);

        return [
            'limit' => $limit,
            'data' => $query->findAll()
        ];
    }

    /**
     * @Get("users/{id}")
     */
    final public function onGetById(int $id)
    {
        return $this->repository->findById($id);
    }

    /**
     * @Post("users")
     */
    final public function onPost(User $user)
    {
        return $this->repository->save($user);
    }

    /**
     * @Put("users/{id}")
     */
    final public function onPut(User $user, int $id = 0)
    {
        $user->Id = $id;
        $this->repository->save($user);
        return $this->repository->findById($id);
    }

    /**
     * @Delete("users/{id}")
     */
    final public function onDelete(int $id)
    {
        $this->repository->removeById($id);
    }
}
