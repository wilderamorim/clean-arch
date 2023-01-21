<?php
declare(strict_types=1);

namespace App\Repositories\Categories;

use App\Entities\Categories\Category;
//use Ramsey\Uuid\Uuid;

/**
 * Class CategoryRepository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @param Category $category
     * @return array
     */
    public function create(Category $category): array
    {
        $path = dirname(__DIR__, 3) . '/database';
        $file = $path . '/categories.json';
        if (file_exists($file)) {
            $api = json_decode(file_get_contents($file), true);
        }

        if (!is_dir($path)) {
            mkdir($path);
        }

        $category = [[
            'id' => md5(uniqid((string)rand(), true)), // Uuid::uuid4()->toString(),
            'name' => $category->getName(),
            'description' => $category->getDescription(),
        ]];

        $json = json_encode(array_merge($api ?? [], $category), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents($file, $json);

        if (!file_exists($file)) {
            return ['error' => 'Oops, an error occurred'];
        }

        return json_decode(file_get_contents($file), true);
    }
}