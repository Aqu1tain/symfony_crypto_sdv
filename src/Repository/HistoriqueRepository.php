<?php
namespace App\Repository;

use App\Entity\Historique;
use App\Entity\Crypto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HistoriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Historique::class);
    }


    public function getHistoriqueByDate(\DateTimeInterface $date, ?Crypto $crypto = null): array
    {
        $start = (new \DateTimeImmutable($date->format('Y-m-d')))->setTime(0, 0, 0);
        $end = $start->modify('+1 day');

        $qb = $this->createQueryBuilder('h')
            ->andWhere('h.date >= :start AND h.date < :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->orderBy('h.date', 'ASC');

        if ($crypto !== null) {
            $qb->andWhere('h.crypto = :crypto')->setParameter('crypto', $crypto);
        }

        return $qb->getQuery()->getResult();
    }

    public function findOneHistoriqueAt(\DateTimeInterface $dateTime, Crypto $crypto): ?Historique
    {
        $start = (new \DateTimeImmutable($dateTime->format('Y-m-d')))->setTime(0, 0, 0);
        $end = $start->modify('+1 day');

        return $this->createQueryBuilder('h')
            ->andWhere('h.date >= :start AND h.date < :end')
            ->andWhere('h.crypto = :crypto')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->setParameter('crypto', $crypto)
            ->orderBy('h.date', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
