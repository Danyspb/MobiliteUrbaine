<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PosteRepository::class)
 */
class Poste
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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="poste")
     */
    private $posuser;

    public function __construct()
    {
        $this->posuser = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getPosuser(): Collection
    {
        return $this->posuser;
    }

    public function addPosuser(User $posuser): self
    {
        if (!$this->posuser->contains($posuser)) {
            $this->posuser[] = $posuser;
            $posuser->setPoste($this);
        }

        return $this;
    }

    public function removePosuser(User $posuser): self
    {
        if ($this->posuser->removeElement($posuser)) {
            // set the owning side to null (unless already changed)
            if ($posuser->getPoste() === $this) {
                $posuser->setPoste(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }
}
