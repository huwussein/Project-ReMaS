<?php

namespace App\Repository;

use App\Entity\Innames;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Innames|null find($id, $lockMode = null, $lockVersion = null)
 * @method Innames|null findOneBy(array $criteria, array $orderBy = null)
 * @method Innames[]    findAll()
 * @method Innames[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InnamesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Innames::class);
    }

    // /**
    //  * @return Innames[] Returns an array of Innames objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Innames
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
