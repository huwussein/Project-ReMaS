<?php

namespace App\Repository;

use App\Entity\OnderdeelApparaat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OnderdeelApparaat|null find($id, $lockMode = null, $lockVersion = null)
 * @method OnderdeelApparaat|null findOneBy(array $criteria, array $orderBy = null)
 * @method OnderdeelApparaat[]    findAll()
 * @method OnderdeelApparaat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OnderdeelApparaatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OnderdeelApparaat::class);
    }

    // /**
    //  * @return OnderdeelApparaat[] Returns an array of OnderdeelApparaat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OnderdeelApparaat
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
