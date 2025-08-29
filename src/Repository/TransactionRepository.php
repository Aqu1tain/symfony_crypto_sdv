<?php
namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }


    public function findByUser(User $user): array {
        return $this->createQueryBuilder('t')
            ->where('t.user_sender = :user OR t.user_receiver = :user')
            ->setParameter('user', $user)
            ->orderBy('t.date', 'DESC')
            ->getQuery()
            ->getResult();
    }


    public function findByCrypto(Crypto $c): array {
        return $this->createQueryBuilder('t')
            ->where('t.crypto = :crypto')
            ->setParameter('crypto', $c)
            ->getQuery()
            ->getResult();
    }
}
