<?php

namespace App\Repository;

use App\Entity\StoredProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StoredProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoredProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoredProject[]    findAll()
 * @method StoredProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoredProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoredProject::class);
    }

    // /**
    //  * @return StoredProject[] Returns an array of StoredProject objects
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
    public function findOneBySomeField($value): ?StoredProject
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
