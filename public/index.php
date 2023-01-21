<?php
declare(strict_types=1);

require dirname(__DIR__, 1) . '/vendor/autoload.php';


$categoryRepository = new \App\Repositories\Categories\CategoryRepository();
$categoryUseCase = new \App\UseCases\Categories\CreateCategoryUseCase($categoryRepository);
$categoryController = new \App\Controllers\Categories\CategoryController($categoryUseCase);

$categoryController->create([
    'name' => filter_input(INPUT_GET, 'name') ?? 'Foo',
    'description' => filter_input(INPUT_GET, 'description') ?? 'Bar',
]);
