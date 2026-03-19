<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Question extends AbstractEntity
{
    protected string $title = '';

    protected string $perex = '';

    /** @var ObjectStorage<Answer> */
    protected ObjectStorage $answers;

    public function __construct()
    {
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

    /** @return ObjectStorage<Answer> */
    public function getAnswers(): ObjectStorage
    {
        return $this->answers;
    }
}
