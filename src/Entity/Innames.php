<?php

namespace App\Entity;

use App\Repository\InnamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InnamesRepository::class)
 */
class Innames
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="innames")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MedewerkerId;

    /**
     * @ORM\Column(type="time")
     */
    private $Tijdstip;

    /**
     * @ORM\OneToMany(targetEntity=InnameApparaat::class, mappedBy="InnameId")
     */
    private $innameApparaats;

    public function __construct()
    {
        $this->innameApparaats = new ArrayCollection();
    }

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

    public function getTijdstip(): ?\DateTimeInterface
    {
        return $this->Tijdstip;
    }

    public function setTijdstip(\DateTimeInterface $Tijdstip): self
    {
        $this->Tijdstip = $Tijdstip;

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
            $innameApparaat->setInnameId($this);
        }

        return $this;
    }

    public function removeInnameApparaat(InnameApparaat $innameApparaat): self
    {
        if ($this->innameApparaats->removeElement($innameApparaat)) {
            // set the owning side to null (unless already changed)
            if ($innameApparaat->getInnameId() === $this) {
                $innameApparaat->setInnameId(null);
            }
        }

        return $this;
    }
}
