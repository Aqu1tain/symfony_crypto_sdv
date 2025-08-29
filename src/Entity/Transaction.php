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

    #[ORM\ManyToOne(targetEntity: Crypto::class, inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Crypto $crypto = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    private ?User $user_sender = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'transactions')]
    private ?User $user_receiver = null;

    #[ORM\Column(type: 'integer')]
    private ?int $qte = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int { return $this->id; }
    public function getCrypto(): ?Crypto { return $this->crypto; }
    public function setCrypto(?Crypto $crypto): self { $this->crypto = $crypto; return $this; }

    public function getUserSender(): ?User { return $this->user_sender; }
    public function setUserSender(?User $user): self { $this->user_sender = $user; return $this; }

    public function getUserReceiver(): ?User { return $this->user_receiver; }
    public function setUserReceiver(?User $user): self { $this->user_receiver = $user; return $this; }

    public function getQte(): ?int { return $this->qte; }
    public function setQte(int $qte): self { $this->qte = $qte; return $this; }

    public function getDate(): ?\DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): self { $this->date = $date; return $this; }
}
