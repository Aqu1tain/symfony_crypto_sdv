<?php
namespace App\Repository;

use App\Entity\Crypto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CryptoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Crypto::class);
    }

    public function findByName(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.name', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
