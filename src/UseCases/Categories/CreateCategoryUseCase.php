<?php
declare(strict_types=1);

namespace App\UseCases\Categories;

use App\DTO\Categories\CategoryDTO;
use App\Entities\Categories\Category;
use App\Repositories\Categories\CategoryRepository;

/**
 * Class CreateCategoryUseCase
 */
class CreateCategoryUseCase
{
    /** @var CategoryRepository */
    private CategoryRepository $repository;

    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CategoryDTO $categoryDTO
     * @return array|string[]
     */
    public function execute(CategoryDTO $categoryDTO): array
    {
        $category = new Category($categoryDTO->getName(), $categoryDTO->getDescription());
        $categories = $this->repository->create($category);

        return [
            'message' => 'Category created successfully',
            'database' => 'database/categories.json',
            'data' => [
                $categories,
            ],
        ];
    }
}