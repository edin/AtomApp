<?php

namespace App\Controllers;

use App\Models\UserRepository;

final class ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Get("users")
     */
    final public function onGet(UserRepository $repository)
    {
        return $repository->findAll();
    }

    /**
     * @Post("users")
     */
    final public function onPost()
    {
        return ["result" => "Executed onPost method."];
    }

    /**
     * @Put("users/{id}")
     */
    final public function onPut(int $id = 0)
    {
        return ["result" => "Executed onPut method.", "id" => $id];
    }

    /**
     * @Patch("users")
     */
    final public function onPatch()
    {
        return ["result" => "Executed onPatch method."];
    }

    /**
     * @Delete("users")
     */
    final public function onDelete()
    {
        return ["result" => "Executed onDelete method."];
    }
}
