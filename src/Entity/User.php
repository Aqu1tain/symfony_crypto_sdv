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

    #[ORM\Column(type: 'string', length: 255)]
    private string $username = '';

    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'user')]
    private ?Transaction $transaction;

    public function getId(): ?int {
        return $this->id;
    }

    public function  getUsername(): ?string {
        return $this->username;
    }

    public function setUsername(string $username): self {
        $this->username = $username;
        return $this;
    }
}
