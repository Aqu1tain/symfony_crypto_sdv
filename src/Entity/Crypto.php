<?php
namespace App\Entity;

use App\Entity\Transaction;
use App\Repository\CryptoRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CryptoRepository::class)]
class Crypto
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $value = null;

    // ✅ FIX: OneToMany must be a Collection, not a single Transaction
    #[ORM\OneToMany(mappedBy: 'crypto', targetEntity: Transaction::class)]
    private ?Collection $transaction = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getValue(): ?string {
        return $this->value;
    }

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function setValue(string $value): self {
        $this->value = $value;
        return $this;
    }
}
