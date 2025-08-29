<?php
namespace App\Entity;

use App\Entity\Transaction;
use App\Repository\CryptoRepository;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CryptoRepository::class)]
class Crypto
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name = '';

    #[ORM\ManyToOne(targetEntity: User::class , inversedBy: 'cryptos')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Transaction::class, inversedBy: 'cryptos')]
    private ?Transaction $transaction = null;

    #[OneToMany(targetEntity: Crypto::class, mappedBy: 'cryptos')]
    private ?Historique $historique = null;

    #[ORM\Column(type: 'float', length: 255)]
    private float $value;

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
