<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findByName(string $name): object
    {
        return $this->findOneBy(['name' => $name]);
    }

    public function findWithTransactions(User $user): ?User
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.transactions', 't')->addSelect('t')
            ->where('u = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
