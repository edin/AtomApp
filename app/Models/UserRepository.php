<?php

namespace App\Models;

use Atom\Collections\Collection;
use Atom\Database\Database;
use Atom\Database\Query\Operator;
use Atom\Database\Repository;

class UserRepository extends Repository
{
    public function __construct(Database $database)
    {
        parent::__construct($database, User::class);
    }

    public function findExampleAll()
    {
        $query = $this->query()
                ->where("id", Operator::greater(2))
                ->where("id", Operator::less(10))
                ->orWhere("id = :id", 100)
                ->limit(10);

        return Collection::from($query->queryAll());
    }
}
