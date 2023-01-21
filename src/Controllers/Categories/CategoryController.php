<?php
declare(strict_types=1);

namespace App\Controllers\Categories;

use App\DTO\Categories\CategoryDTO;
use App\UseCases\Categories\CreateCategoryUseCase;

/**
 * Class CategoryController
 */
class CategoryController
{
    /** @var CreateCategoryUseCase */
    private CreateCategoryUseCase $createCategoryUseCase;

    /** @param CreateCategoryUseCase $createCategoryUseCase */
    public function __construct(CreateCategoryUseCase $createCategoryUseCase)
    {
        $this->createCategoryUseCase = $createCategoryUseCase;
    }

    /**
     * @param array $request
     * @return void
     */
    public function create(array $request)
    {
        $categoryDTO = new CategoryDTO(
            $request['name'],
            $request['description']
        );
        $response = $this->createCategoryUseCase->execute($categoryDTO);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}