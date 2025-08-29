<?php
namespace App\Entity;

use App\Entity\User;
use App\Entity\Crypto;
use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private ?int $id = null;

     #[ORM\ManyToMany(targetEntity: Crypto::class, mappedBy: Transaction::class)]
    private ?Crypto $crypto;

     #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
     private ?User $user_sender;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    private ?User $user_receiver;

    #[ORM\Column(type: 'integer')]
    private ?int $qte;

    #[ORM\Column(type: 'string' , length: 255)]
    private ?string $date;

    public function getId(): ?int {
        return $this->id;
    }
}
