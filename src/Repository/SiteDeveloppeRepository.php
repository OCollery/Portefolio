<?php

namespace App\Repository;

use App\Entity\SiteDeveloppe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SiteDeveloppe|null find($id, $lockMode = null, $lockVersion = null)
 * @method SiteDeveloppe|null findOneBy(array $criteria, array $orderBy = null)
 * @method SiteDeveloppe[]    findAll()
 * @method SiteDeveloppe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiteDeveloppeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SiteDeveloppe::class);
    }

    // /**
    //  * @return SiteDeveloppe[] Returns an array of SiteDeveloppe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SiteDeveloppe
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
