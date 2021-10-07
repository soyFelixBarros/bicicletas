<?php

namespace App\Repository;

use App\Entity\PlanTypeBicycle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanTypeBicycle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanTypeBicycle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanTypeBicycle[]    findAll()
 * @method PlanTypeBicycle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanTypeBicycleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanTypeBicycle::class);
    }

    // /**
    //  * @return PlanTypeBicycle[] Returns an array of PlanTypeBicycle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanTypeBicycle
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
