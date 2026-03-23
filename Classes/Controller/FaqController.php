<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Controller;

use MarekSkopal\MsFaq\Domain\Model\Question;
use MarekSkopal\MsFaq\Domain\Repository\QuestionRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use const JSON_HEX_TAG;
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;

class FaqController extends ActionController
{
    public function __construct(private readonly QuestionRepository $questionRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        /**
         * @var array{
         *     showOnlyTop?: int,
         *     ordering?: string,
         *  } $settings
         */
        $settings = $this->settings;

        $showOnlyTop = (bool) ($settings['showOnlyTop'] ?? 0);
        $ordering = $settings['ordering'] ?? 'topSorting';
        $questions = match (true) {
            $showOnlyTop && $ordering === 'uid' => $this->questionRepository->findAllOrderedTopOnlyByUid(),
            $showOnlyTop && $ordering === 'alphabetically' => $this->questionRepository->findAllOrderedTopOnlyAlphabetically(),
            $showOnlyTop => $this->questionRepository->findAllOrderedTopOnly(),
            $ordering === 'sorting' => $this->questionRepository->findAllOrderedBySorting(),
            $ordering === 'uid' => $this->questionRepository->findAllOrderedByUid(),
            $ordering === 'alphabetically' => $this->questionRepository->findAllOrderedAlphabetically(),
            default => $this->questionRepository->findAllOrdered(),
        };
        $this->view->assign('questions', $questions);
        $this->view->assign('jsonLd', $this->buildJsonLd($questions));

        return $this->htmlResponse();
    }

    /** @param QueryResultInterface<int, Question> $questions */
    private function buildJsonLd(QueryResultInterface $questions): string
    {
        $entities = [];
        foreach ($questions as $question) {
            if ($question->getAnswers()->count() === 0) {
                continue;
            }
            $answerText = '';
            foreach ($question->getAnswers() as $answer) {
                $answerText .= strip_tags($answer->getContent()) . ' ';
            }
            $entities[] = [
                '@type' => 'Question',
                'name' => $question->getTitle(),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => trim($answerText),
                ],
            ];
        }
        if ($entities === []) {
            return '';
        }
        $json = json_encode(
            [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $entities,
            ],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG,
        );
        return $json !== false ? $json : '';
    }
}
