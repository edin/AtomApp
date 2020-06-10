<?php

namespace App\Domain\Repositories;

use App\Domain\Models\User;
use Atom\Database\Repository;
use Atom\Database\Query\Operator;

final class UserRepository extends Repository
{
    protected string $entityType = User::class;

    public function findExampleAll()
    {
        $this->query()
            ->where("id", Operator::greater(2))
            ->where("id", Operator::less(10))
            ->orWhere("id = :id", 100)
            ->limit(10)
            ->findAll();
    }
}
