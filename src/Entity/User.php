<?php
namespace App\Entity;

use App\Repository\UserRepository;
use App\Entity\Transaction;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $username = '';

    #[ORM\OneToMany(mappedBy: 'user_sender', targetEntity: Transaction::class)]
    private $sentTransactions;

    #[ORM\OneToMany(mappedBy: 'user_receiver', targetEntity: Transaction::class)]
    private $receivedTransactions;

    public function __construct()
    {
        $this->sentTransactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->receivedTransactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getUsername(): ?string { return $this->username; }
    public function setUsername(string $username): self { $this->username = $username; return $this; }

    /** @return Collection<int, Transaction> */
    public function getSentTransactions() { return $this->sentTransactions; }

    /** @return Collection<int, Transaction> */
    public function getReceivedTransactions() { return $this->receivedTransactions; }
}

