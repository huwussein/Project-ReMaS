<?php

namespace App\Entity;

use App\Repository\ApparatenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApparatenRepository::class)
 */
class Apparaten
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
    private $Vergoeding;

    /**
     * @ORM\Column(type="integer")
     */
    private $GewichtGram;

    /**
     * @ORM\OneToMany(targetEntity=OnderdeelApparaat::class, mappedBy="ApparaatId")
     */
    private $onderdeelApparaats;

    /**
     * @ORM\OneToMany(targetEntity=InnameApparaat::class, mappedBy="ApparaatId")
     */
    private $innameApparaats;

    public function __construct()
    {
        $this->onderdeelApparaats = new ArrayCollection();
        $this->innameApparaats = new ArrayCollection();
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

    public function getVergoeding(): ?float
    {
        return $this->Vergoeding;
    }

    public function setVergoeding(float $Vergoeding): self
    {
        $this->Vergoeding = $Vergoeding;

        return $this;
    }

    public function getGewichtGram(): ?int
    {
        return $this->GewichtGram;
    }

    public function setGewichtGram(int $GewichtGram): self
    {
        $this->GewichtGram = $GewichtGram;

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
            $onderdeelApparaat->setApparaatId($this);
        }

        return $this;
    }

    public function removeOnderdeelApparaat(OnderdeelApparaat $onderdeelApparaat): self
    {
        if ($this->onderdeelApparaats->removeElement($onderdeelApparaat)) {
            // set the owning side to null (unless already changed)
            if ($onderdeelApparaat->getApparaatId() === $this) {
                $onderdeelApparaat->setApparaatId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InnameApparaat[]
     */
    public function getInnameApparaats(): Collection
    {
        return $this->innameApparaats;
    }

    public function addInnameApparaat(InnameApparaat $innameApparaat): self
    {
        if (!$this->innameApparaats->contains($innameApparaat)) {
            $this->innameApparaats[] = $innameApparaat;
            $innameApparaat->setApparaatId($this);
        }

        return $this;
    }

    public function removeInnameApparaat(InnameApparaat $innameApparaat): self
    {
        if ($this->innameApparaats->removeElement($innameApparaat)) {
            // set the owning side to null (unless already changed)
            if ($innameApparaat->getApparaatId() === $this) {
                $innameApparaat->setApparaatId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam(). ' -> '.$this->getOmschrijving();
    }
}
