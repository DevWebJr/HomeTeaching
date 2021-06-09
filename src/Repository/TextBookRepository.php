<?php

namespace App\Repository;

use App\Entity\TextBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TextBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextBook[]    findAll()
 * @method TextBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextBook::class);
    }

    // /**
    //  * @return TextBook[] Returns an array of TextBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TextBook
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
