<?php

namespace App\Entity;

use App\Repository\RollenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RollenRepository::class)
 */
class Rollen
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Omschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $Waarde;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->Omschrijving;
    }

    public function setOmschrijving(?string $Omschrijving): self
    {
        $this->Omschrijving = $Omschrijving;

        return $this;
    }

    public function getWaarde(): ?int
    {
        return $this->Waarde;
    }

    public function setWaarde(int $Waarde): self
    {
        $this->Waarde = $Waarde;

        return $this;
    }
}
