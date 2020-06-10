<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Category;
use Atom\Database\Repository;

final class CategoryRepository extends Repository
{
    protected string $entityType = Category::class;
}
