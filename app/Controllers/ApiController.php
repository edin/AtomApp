<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserRepository;

final class ApiController
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * @Get("users")
     */
    final public function onGet(UserRepository $repository)
    {
        return $this->repository->findAll();
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
        $this->repository->save($user);
        return $user;
    }

    /**
     * @Put("users/{id}")
     */
    final public function onPut(int $id = 0, User $user)
    {
        $user->Id = $id;
        $this->repository->save($user);
        return $user;
    }

    /**
     * @Delete("users/{id}")
     */
    final public function onDelete(UserRepository $repository, int $id)
    {
        //TODO: Return response status
        $repository->removeById($id);
    }
}
