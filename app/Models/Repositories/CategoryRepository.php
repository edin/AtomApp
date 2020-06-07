<?php

namespace App\Models\Repositories;

use App\Models\Category;
use Atom\Database\Repository;

final class CategoryRepository extends Repository
{
    protected string $entityType = Category::class;
}
