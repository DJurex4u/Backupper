<?php

namespace App\Repository;

use App\Entity\PeriodType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PeriodType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodType[]    findAll()
 * @method PeriodType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodType::class);
    }
}
