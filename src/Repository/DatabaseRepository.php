<?php

namespace App\Repository;

use App\Entity\BDatabase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BDatabase|null find($id, $lockMode = null, $lockVersion = null)
 * @method BDatabase|null findOneBy(array $criteria, array $orderBy = null)
 * @method BDatabase[]    findAll()
 * @method BDatabase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatabaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BDatabase::class);
    }
}
