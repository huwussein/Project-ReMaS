<?php

namespace App\Entity;

use App\Repository\UitgiftesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UitgiftesRepository::class)
 */
class Uitgiftes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="uitgiftes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MedewerkerId;

    /**
     * @ORM\ManyToOne(targetEntity=Onderdelen::class, inversedBy="uitgiftes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OnderdeelId;

    /**
     * @ORM\Column(type="time")
     */
    private $Tijdstip;

    /**
     * @ORM\Column(type="integer")
     */
    private $GewichtKg;

    /**
     * @ORM\Column(type="float")
     */
    private $Prijs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedewerkerId(): ?User
    {
        return $this->MedewerkerId;
    }

    public function setMedewerkerId(?User $MedewerkerId): self
    {
        $this->MedewerkerId = $MedewerkerId;

        return $this;
    }

    public function getOnderdeelId(): ?Onderdelen
    {
        return $this->OnderdeelId;
    }

    public function setOnderdeelId(?Onderdelen $OnderdeelId): self
    {
        $this->OnderdeelId = $OnderdeelId;

        return $this;
    }

    public function getTijdstip(): ?\DateTimeInterface
    {
        return $this->Tijdstip;
    }

    public function setTijdstip(\DateTimeInterface $Tijdstip): self
    {
        $this->Tijdstip = $Tijdstip;

        return $this;
    }

    public function getGewichtKg(): ?int
    {
        return $this->GewichtKg;
    }

    public function setGewichtKg(int $GewichtKg): self
    {
        $this->GewichtKg = $GewichtKg;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->Prijs;
    }

    public function setPrijs(float $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }
}
