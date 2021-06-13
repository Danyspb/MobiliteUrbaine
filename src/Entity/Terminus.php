<?php

namespace App\Entity;

use App\Repository\TerminusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TerminusRepository::class)
 */
class Terminus
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Bus::class, mappedBy="terminus")
     */
    private $termbus;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="userterm")
     */
    private $users;

    public function __construct()
    {
        $this->termbus = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Bus[]
     */
    public function getTermbus(): Collection
    {
        return $this->termbus;
    }

    public function addTermbu(Bus $termbu): self
    {
        if (!$this->termbus->contains($termbu)) {
            $this->termbus[] = $termbu;
            $termbu->setTerminus($this);
        }

        return $this;
    }

    public function removeTermbu(Bus $termbu): self
    {
        if ($this->termbus->removeElement($termbu)) {
            // set the owning side to null (unless already changed)
            if ($termbu->getTerminus() === $this) {
                $termbu->setTerminus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addUserterm($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeUserterm($this);
        }

        return $this;
    }
}
