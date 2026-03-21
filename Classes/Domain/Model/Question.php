<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Question extends AbstractEntity
{
    protected string $title = '';

    protected string $perex = '';

    /** @var ObjectStorage<Category> */
    protected ObjectStorage $categories;

    protected bool $alwaysOpen = false;

    protected bool $top = false;

    /** @var ObjectStorage<Answer> */
    protected ObjectStorage $answers;

    public function __construct()
    {
        $this->categories = new ObjectStorage();
        $this->answers = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPerex(): string
    {
        return $this->perex;
    }

    /** @return ObjectStorage<Category> */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function getPrimaryCategory(): ?Category
    {
        foreach ($this->categories as $category) {
            return $category;
        }
        return null;
    }

    public function isAlwaysOpen(): bool
    {
        return $this->alwaysOpen;
    }

    public function isTop(): bool
    {
        return $this->top;
    }

    /** @return ObjectStorage<Answer> */
    public function getAnswers(): ObjectStorage
    {
        return $this->answers;
    }
}
