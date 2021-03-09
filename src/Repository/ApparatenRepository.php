<?php

namespace App\Repository;

use App\Entity\Apparaten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apparaten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apparaten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apparaten[]    findAll()
 * @method Apparaten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApparatenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apparaten::class);
    }

    // /**
    //  * @return Apparaten[] Returns an array of Apparaten objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Apparaten
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
