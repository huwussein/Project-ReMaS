<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
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
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Uitgiftes::class, mappedBy="MedewerkerNaam")
     */
    private $uitgiftes;

    /**
     * @ORM\OneToMany(targetEntity=Innames::class, mappedBy="MedewerkerNaam")
     */
    private $innames;

    public function __construct()
    {
        $this->uitgiftes = new ArrayCollection();
        $this->innames = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $uitgifte->setMedewerkerNaam($this);
        }

        return $this;
    }

    public function removeUitgifte(Uitgiftes $uitgifte): self
    {
        if ($this->uitgiftes->removeElement($uitgifte)) {
            // set the owning side to null (unless already changed)
            if ($uitgifte->getMedewerkerNaam() === $this) {
                $uitgifte->setMedewerkerNaam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Innames[]
     */
    public function getInnames(): Collection
    {
        return $this->innames;
    }

    public function addInname(Innames $inname): self
    {
        if (!$this->innames->contains($inname)) {
            $this->innames[] = $inname;
            $inname->setMedewerkerNaam($this);
        }

        return $this;
    }

    public function removeInname(Innames $inname): self
    {
        if ($this->innames->removeElement($inname)) {
            // set the owning side to null (unless already changed)
            if ($inname->getMedewerkerNaam() === $this) {
                $inname->setMedewerkerNaam(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNaam();
    }
}
