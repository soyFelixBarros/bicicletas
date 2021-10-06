<?php

namespace App\Repository;

use App\Entity\TypeBicycle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeBicycle|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBicycle|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBicycle[]    findAll()
 * @method TypeBicycle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBicycleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBicycle::class);
    }

    // /**
    //  * @return TypeBicycle[] Returns an array of TypeBicycle objects
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
    public function findOneBySomeField($value): ?TypeBicycle
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
