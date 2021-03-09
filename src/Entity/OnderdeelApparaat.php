<?php

namespace App\Entity;

use App\Repository\OnderdeelApparaatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OnderdeelApparaatRepository::class)
 */
class OnderdeelApparaat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Onderdelen::class, inversedBy="onderdeelApparaats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OnderdeelId;

    /**
     * @ORM\ManyToOne(targetEntity=Apparaten::class, inversedBy="onderdeelApparaats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ApparaatId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Percentage;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getApparaatId(): ?Apparaten
    {
        return $this->ApparaatId;
    }

    public function setApparaatId(?Apparaten $ApparaatId): self
    {
        $this->ApparaatId = $ApparaatId;

        return $this;
    }

    public function getPercentage(): ?int
    {
        return $this->Percentage;
    }

    public function setPercentage(?int $Percentage): self
    {
        $this->Percentage = $Percentage;

        return $this;
    }
}
