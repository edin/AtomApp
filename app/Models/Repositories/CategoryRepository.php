<?php

namespace App\Models\Repositories;

use App\Models\Category;
use Atom\Database\Database;
use Atom\Database\Repository;

final class CategoryRepository extends Repository
{
    //protected $entityType = Category::class;

    public function __construct(Database $database)
    {
        parent::__construct($database, Category::class);
    }
}
