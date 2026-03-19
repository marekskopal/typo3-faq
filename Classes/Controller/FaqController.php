<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Controller;

use MarekSkopal\MsFaq\Domain\Repository\QuestionRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FaqController extends ActionController
{
    public function __construct(private readonly QuestionRepository $questionRepository)
    {
    }

    public function listAction(): ResponseInterface
    {
        $this->view->assign('questions', $this->questionRepository->findAllOrdered());

        return $this->htmlResponse();
    }
}
