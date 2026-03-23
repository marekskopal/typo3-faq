<?php

declare(strict_types=1);

namespace MarekSkopal\MsFaq\Domain\Repository;

use MarekSkopal\MsFaq\Domain\Model\Question;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/** @extends Repository<Question> */
class QuestionRepository extends Repository
{
    /** @return QueryResultInterface<int, Question> */
    public function findAllOrdered(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings([
            'top' => QueryInterface::ORDER_DESCENDING,
            'sorting' => QueryInterface::ORDER_ASCENDING,
        ]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedBySorting(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedByUid(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['uid' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedAlphabetically(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedTopOnly(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('top', true));
        $query->setOrderings(['sorting' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedTopOnlyByUid(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('top', true));
        $query->setOrderings(['uid' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /** @return QueryResultInterface<int, Question> */
    public function findAllOrderedTopOnlyAlphabetically(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('top', true));
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }
}
