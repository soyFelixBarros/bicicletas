<?php

namespace App\Repository;

use App\Entity\Bicycle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bicycle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bicycle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bicycle[]    findAll()
 * @method Bicycle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BicycleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bicycle::class);
    }

    /**
     * @return Bicycle[] Returns an array of Bicycle objects
     */
    public function findAvailable(string $orderBy = 'ASC', int $maxResults = 10)
    {
        return $this->createQueryBuilder('b')
            ->leftJoin('b.rentals', 'r', 'WITH', 'r.returned = false')
            ->where('r.returned = true OR r.returned IS NULL')
            ->orderBy('b.id', $orderBy)
            ->setMaxResults($maxResults)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Bicycle
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
