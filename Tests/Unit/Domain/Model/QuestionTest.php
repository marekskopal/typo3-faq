<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Tests\Unit\Domain\Model;

use MarekSkopal\MsFaq\Domain\Model\Answer;
use MarekSkopal\MsFaq\Domain\Model\Question;
use PHPUnit\Framework\TestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

final class QuestionTest extends TestCase
{
    private Question $question;

    protected function setUp(): void
    {
        $this->question = new Question();
    }

    public function testTitleDefaultsToEmptyString(): void
    {
        self::assertSame('', $this->question->getTitle());
    }

    public function testPerexDefaultsToEmptyString(): void
    {
        self::assertSame('', $this->question->getPerex());
    }

    public function testAlwaysOpenDefaultsToFalse(): void
    {
        self::assertFalse($this->question->isAlwaysOpen());
    }

    public function testTopDefaultsToFalse(): void
    {
        self::assertFalse($this->question->isTop());
    }

    public function testAnswersDefaultsToEmptyObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->question->getAnswers());
        self::assertSame(0, $this->question->getAnswers()->count());
    }

    public function testCategoriesDefaultsToEmptyObjectStorage(): void
    {
        self::assertInstanceOf(ObjectStorage::class, $this->question->getCategories());
        self::assertSame(0, $this->question->getCategories()->count());
    }

    public function testGetPrimaryCategoryReturnsNullWhenNoCategoriesSet(): void
    {
        self::assertNull($this->question->getPrimaryCategory());
    }

    public function testGetAnswersReturnsCorrectAnswers(): void
    {
        $answer = new Answer();
        $storage = new ObjectStorage();
        $storage->attach($answer);

        $this->question->_setProperty('answers', $storage);

        self::assertSame(1, $this->question->getAnswers()->count());
    }
}
