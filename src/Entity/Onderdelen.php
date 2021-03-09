<?php

namespace App\Entity;

use App\Repository\OnderdelenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OnderdelenRepository::class)
 */
class Onderdelen
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
     * @ORM\Column(type="float")
     */
    private $PrijsPerKg;

    /**
     * @ORM\Column(type="float")
     */
    private $VoorraadKg;

    /**
     * @ORM\OneToMany(targetEntity=OnderdeelApparaat::class, mappedBy="OnderdeelId")
     */
    private $onderdeelApparaats;

    /**
     * @ORM\OneToMany(targetEntity=Uitgiftes::class, mappedBy="OnderdeelId")
     */
    private $uitgiftes;

    public function __construct()
    {
        $this->onderdeelApparaats = new ArrayCollection();
        $this->uitgiftes = new ArrayCollection();
    }

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

    public function getPrijsPerKg(): ?float
    {
        return $this->PrijsPerKg;
    }

    public function setPrijsPerKg(float $PrijsPerKg): self
    {
        $this->PrijsPerKg = $PrijsPerKg;

        return $this;
    }

    public function getVoorraadKg(): ?float
    {
        return $this->VoorraadKg;
    }

    public function setVoorraadKg(float $VoorraadKg): self
    {
        $this->VoorraadKg = $VoorraadKg;

        return $this;
    }

    /**
     * @return Collection|OnderdeelApparaat[]
     */
    public function getOnderdeelApparaats(): Collection
    {
        return $this->onderdeelApparaats;
    }

    public function addOnderdeelApparaat(OnderdeelApparaat $onderdeelApparaat): self
    {
        if (!$this->onderdeelApparaats->contains($onderdeelApparaat)) {
            $this->onderdeelApparaats[] = $onderdeelApparaat;
            $onderdeelApparaat->setOnderdeelId($this);
        }

        return $this;
    }

    public function removeOnderdeelApparaat(OnderdeelApparaat $onderdeelApparaat): self
    {
        if ($this->onderdeelApparaats->removeElement($onderdeelApparaat)) {
            // set the owning side to null (unless already changed)
            if ($onderdeelApparaat->getOnderdeelId() === $this) {
                $onderdeelApparaat->setOnderdeelId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Uitgiftes[]
     */
    public function getUitgiftes(): Collection
    {
        return $this->uitgiftes;
    }

    public function addUitgifte(Uitgiftes $uitgifte): self
    {
        if (!$this->uitgiftes->contains($uitgifte)) {
            $this->uitgiftes[] = $uitgifte;
            $uitgifte->setOnderdeelId($this);
        }

        return $this;
    }

    public function removeUitgifte(Uitgiftes $uitgifte): self
    {
        if ($this->uitgiftes->removeElement($uitgifte)) {
            // set the owning side to null (unless already changed)
            if ($uitgifte->getOnderdeelId() === $this) {
                $uitgifte->setOnderdeelId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam(). ' -> '.$this->getOmschrijving();
    }
}
