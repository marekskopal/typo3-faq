<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Answer extends AbstractEntity
{
    protected string $content = '';

    public function getContent(): string
    {
        return $this->content;
    }
}
