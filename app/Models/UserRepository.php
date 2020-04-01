<?php

namespace App\Models;

use Atom\Database\Query\Query;
use Atom\Collections\Collection;
use Atom\Database\Query\Operator;

class UserRepository
{
    public function findAll()
    {
        $query = Query::select("users u")
                ->where("u.id", Operator::greater(2))
                ->where("u.id", Operator::less(10))
                ->orWhere("u.id = :id", 100)
                ->limit(10);

        $items = $query->queryAll();

        return Collection::from($items)->map(function ($item) {
            return User::from(
                $item['id'],
                $item['first_name'],
                $item['last_name'],
                $item['email']
            );
        });
    }
}
