<?php

namespace App\Models;

use Atom\Database\Connection;
use Atom\Database\Query\Compilers\MySqlCompiler;
use Atom\Database\Query\Criteria;
use Atom\Database\Query\Operator;
use Atom\Database\Query\Query;

class UserRepository
{
    public function findAll()
    {
        $connection = new Connection(Connection::MySQL, "localhost", "root", "root", "orm_test");
        $compiler = new MySqlCompiler();

        $query = Query::select("users u")
                ->where("u.id", Operator::greater(1))
                ->where("u.id", Operator::less(100))
                ->orWhere(function (Criteria $c) {
                    $c->where("u.id", 500);
                })->limit(10)
                ;

        $sql = $compiler->compileQuery($query);

        $items =  $connection->queryAll($sql, [":id" => 100]);

        return array_map(
            function ($item) {
                return User::from(
                    $item['id'],
                    $item['first_name'],
                    $item['last_name'],
                    $item['email']
                );
            },
            $items
        );
    }
}
