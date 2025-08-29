<?php

namespace App\Repository;

use App\Entity\Historique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HistoriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Historique::class);
    }

    public function getHistoriqueByDate($date): array {
        return $this->createQueryBuilder('h')
            -> orderBy('h.date', 'DESC')
            -> getQuery()
            -> getOneOrNullResult();
    }
}
