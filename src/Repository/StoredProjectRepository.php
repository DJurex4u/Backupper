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
}
