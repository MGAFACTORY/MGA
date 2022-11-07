<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $plaque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modèle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carburant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlaque(): ?string
    {
        return $this->plaque;
    }

    public function setPlaque(?string $plaque): self
    {
        $this->plaque = $plaque;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModèle(): ?string
    {
        return $this->modèle;
    }

    public function setModèle(?string $modèle): self
    {
        $this->modèle = $modèle;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }
}
