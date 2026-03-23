<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Tests\Unit\Domain\Model;

use MarekSkopal\MsFaq\Domain\Model\Answer;
use PHPUnit\Framework\TestCase;

final class AnswerTest extends TestCase
{
    private Answer $answer;

    protected function setUp(): void
    {
        $this->answer = new Answer();
    }

    public function testContentDefaultsToEmptyString(): void
    {
        self::assertSame('', $this->answer->getContent());
    }

    public function testGetContentReturnsSetContent(): void
    {
        $this->answer->_setProperty('content', '<p>FAQ answer text</p>');

        self::assertSame('<p>FAQ answer text</p>', $this->answer->getContent());
    }
}
