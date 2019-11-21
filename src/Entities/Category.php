<?php

namespace InterTree\Entities;

use Doctrine\Common\Collections\Collection;

class Category
{
    /**
     * Id of category
     * @var int $id
     */
    protected $id;

    /**
     * Name of category.
     * @var string $name
     */
    protected $name;

    /**
     * Children of that category.
     * @var Collection
     */
    protected $children;

    /**
     * Parent of that category.
     * @var Category
     */
    protected $parent;

    /**
     * Category constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function createChildren(string $name)
    {
        $category = new Category($name);

        $this->children->add($category);
        $category->setParent($this);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    /**
     * @return Category
     */
    public function getParent(): Category
    {
        return $this->parent;
    }

    /**
     * @param Category $parent
     */
    public function setParent(Category $parent): void
    {
        $this->parent = $parent;
    }
}