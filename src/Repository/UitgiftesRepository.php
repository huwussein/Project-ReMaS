<?php

namespace App\Repository;

use App\Entity\Uitgiftes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Uitgiftes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uitgiftes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uitgiftes[]    findAll()
 * @method Uitgiftes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UitgiftesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uitgiftes::class);
    }

    // /**
    //  * @return Uitgiftes[] Returns an array of Uitgiftes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uitgiftes
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
