<?php

namespace App\Repository;

use App\Entity\Rollen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rollen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rollen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rollen[]    findAll()
 * @method Rollen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RollenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rollen::class);
    }

    // /**
    //  * @return Rollen[] Returns an array of Rollen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rollen
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
