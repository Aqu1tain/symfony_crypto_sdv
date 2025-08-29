<?php
namespace App\Entity;

use App\Repository\HistoriqueRepository;
use App\Entity\Crypto;
use Doctrine\ORM\Mapping as ORM;

class Historique
{
    #[ORM\Id, ORM\Column(type: 'integer'), ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $date;

    #[ORM\ManyToOne(targetEntity: Crypto::class, inversedBy: 'historique')]
    private Crypto $crypto;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $value;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDate(): ?string {
        return $this->date;
    }

    public function getValue(): ?string {
        return $this->value;
    }

    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }

    public function setValue(string $value): self {
        $this->value = $value;
        return $this;
    }
}
