<?php
declare(strict_types=1);

namespace App\Repositories\Categories;

use App\Entities\Categories\Category;

/**
 * Class CategoryRepositoryInterface
 */
interface CategoryRepositoryInterface
{
    /**
     * @param Category $category
     * @return void
     */
    public function create(Category $category): void;
}