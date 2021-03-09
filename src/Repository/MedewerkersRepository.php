<?php

namespace App\Repository;

use App\Entity\Medewerkers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medewerkers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medewerkers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medewerkers[]    findAll()
 * @method Medewerkers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedewerkersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medewerkers::class);
    }

    // /**
    //  * @return Medewerkers[] Returns an array of Medewerkers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medewerkers
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
