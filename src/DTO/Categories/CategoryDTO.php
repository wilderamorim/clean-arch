<?php
declare(strict_types=1);

namespace App\DTO\Categories;

/**
 * Class CategoryDTO
 */
class CategoryDTO
{
    /** @var string */
    private string $name;

    /** @var string */
    private string $description;

    /**
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}