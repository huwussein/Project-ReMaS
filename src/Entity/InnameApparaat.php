<?php

namespace App\Entity;

use App\Repository\InnameApparaatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InnameApparaatRepository::class)
 */
class InnameApparaat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Innames::class, inversedBy="innameApparaats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $InnameId;

    /**
     * @ORM\ManyToOne(targetEntity=Apparaten::class, inversedBy="innameApparaats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ApparaatId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Ontleed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInnameId(): ?Innames
    {
        return $this->InnameId;
    }

    public function setInnameId(?Innames $InnameId): self
    {
        $this->InnameId = $InnameId;

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

    public function getOntleed(): ?bool
    {
        return $this->Ontleed;
    }

    public function setOntleed(bool $Ontleed): self
    {
        $this->Ontleed = $Ontleed;

        return $this;
    }
}
