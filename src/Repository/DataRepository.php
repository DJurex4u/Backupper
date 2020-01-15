<?php

namespace App\Repository;

use App\Entity\BData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BData|null find($id, $lockMode = null, $lockVersion = null)
 * @method BData|null findOneBy(array $criteria, array $orderBy = null)
 * @method BData[]    findAll()
 * @method BData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BData::class);
    }
}
