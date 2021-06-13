<?php

namespace App\Entity;

use App\Repository\LigneBusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneBusRepository::class)
 */
class LigneBus
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
    private $numeroligne;

    /**
     * @ORM\ManyToOne(targetEntity=Bus::class, inversedBy="busligne")
     */
    private $bus;

    /**
     * @ORM\ManyToOne(targetEntity=Itineraire::class, inversedBy="ligniti")
     */
    private $itineraire;

    /**
     * @ORM\OneToMany(targetEntity=Itineraire::class, mappedBy="ligneBus")
     */
    private $ligneiti;


    public function __construct()
    {
        $this->itiligne = new ArrayCollection();
        $this->ligneiti = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroligne(): ?string
    {
        return $this->numeroligne;
    }

    public function setNumeroligne(string $numeroligne): self
    {
        $this->numeroligne = $numeroligne;

        return $this;
    }

    public function getBus(): ?Bus
    {
        return $this->bus;
    }

    public function setBus(?Bus $bus): self
    {
        $this->bus = $bus;

        return $this;
    }



    public function __toString()
    {
        return $this->getNumeroligne();
    }

    public function getItineraire(): ?Itineraire
    {
        return $this->itineraire;
    }

    public function setItineraire(?Itineraire $itineraire): self
    {
        $this->itineraire = $itineraire;

        return $this;
    }

    /**
     * @return Collection|Itineraire[]
     */
    public function getLigneiti(): Collection
    {
        return $this->ligneiti;
    }

    public function addLigneiti(Itineraire $ligneiti): self
    {
        if (!$this->ligneiti->contains($ligneiti)) {
            $this->ligneiti[] = $ligneiti;
            $ligneiti->setLigneBus($this);
        }

        return $this;
    }

    public function removeLigneiti(Itineraire $ligneiti): self
    {
        if ($this->ligneiti->removeElement($ligneiti)) {
            // set the owning side to null (unless already changed)
            if ($ligneiti->getLigneBus() === $this) {
                $ligneiti->setLigneBus(null);
            }
        }

        return $this;
    }



}
