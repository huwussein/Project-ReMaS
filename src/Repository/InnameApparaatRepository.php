<?php

namespace App\Repository;

use App\Entity\InnameApparaat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InnameApparaat|null find($id, $lockMode = null, $lockVersion = null)
 * @method InnameApparaat|null findOneBy(array $criteria, array $orderBy = null)
 * @method InnameApparaat[]    findAll()
 * @method InnameApparaat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InnameApparaatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InnameApparaat::class);
    }

    // /**
    //  * @return InnameApparaat[] Returns an array of InnameApparaat objects
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
    public function findOneBySomeField($value): ?InnameApparaat
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
