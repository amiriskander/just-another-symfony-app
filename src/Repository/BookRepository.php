<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class BookRepository
 *
 * @package App\Repository
 */
class BookRepository extends ServiceEntityRepository
{
    /**
     * BookRepository constructor.
     *
     * @param ManagerRegistry $registry
     * @param string          $entityClass
     */
    public function __construct(ManagerRegistry $registry, $entityClass = Book::class)
    {
        parent::__construct($registry, $entityClass);
    }
}
