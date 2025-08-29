<?php
namespace App\Repository;

use App\Entity\Transaction;
use App\Entity\User;
use App\Entity\Crypto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManageManagerRegistryrRegistry;
use Doctrine\Persistence\ManagerRegistry;

class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function findByUser(User $u): array {
        return $this->createQueryBuilder('t')
            ->where('t.user = :user')
            ->setParameter('user', $u)
            ->getQuery()
            ->getResult();
    }

    public function findByCrypto(Crypto $c): array {
        return $this->createQueryBuilder('t')
            ->where('t.transaction = :transaction')
            ->setParameter('transaction', $c)
            ->getQuery()
            ->getResult();
    }
}
