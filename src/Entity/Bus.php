<?php

namespace App\Entity;

use App\Repository\BusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusRepository::class)
 */
class Bus
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
    private $typesbus;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrplaces;

    /**
     * @ORM\ManyToOne(targetEntity=Terminus::class, inversedBy="termbus")
     */
    private $terminus;

    /**
     * @ORM\OneToMany(targetEntity=LigneBus::class, mappedBy="bus")
     */
    private $busligne;

    /**
     * @ORM\OneToMany(targetEntity=Itineraire::class, mappedBy="bus")
     */
    private $bus;




    public function __construct()
    {
        $this->busligne = new ArrayCollection();
        $this->bus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypesbus(): ?string
    {
        return $this->typesbus;
    }

    public function setTypesbus(string $typesbus): self
    {
        $this->typesbus = $typesbus;

        return $this;
    }

    public function getNbrplaces(): ?int
    {
        return $this->nbrplaces;
    }

    public function setNbrplaces(int $nbrplaces): self
    {
        $this->nbrplaces = $nbrplaces;

        return $this;
    }

    public function getTerminus(): ?Terminus
    {
        return $this->terminus;
    }

    public function setTerminus(?Terminus $terminus): self
    {
        $this->terminus = $terminus;

        return $this;
    }

    /**
     * @return Collection|LigneBus[]
     */
    public function getBusligne(): Collection
    {
        return $this->busligne;
    }

    public function addBusligne(LigneBus $busligne): self
    {
        if (!$this->busligne->contains($busligne)) {
            $this->busligne[] = $busligne;
            $busligne->setBus($this);
        }

        return $this;
    }

    public function removeBusligne(LigneBus $busligne): self
    {
        if ($this->busligne->removeElement($busligne)) {
            // set the owning side to null (unless already changed)
            if ($busligne->getBus() === $this) {
                $busligne->setBus(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return $this->typesbus;
    }

    /**
     * @return Collection|Itineraire[]
     */
    public function getBus(): Collection
    {
        return $this->bus;
    }

    public function addBu(Itineraire $bu): self
    {
        if (!$this->bus->contains($bu)) {
            $this->bus[] = $bu;
            $bu->setBus($this);
        }

        return $this;
    }

    public function removeBu(Itineraire $bu): self
    {
        if ($this->bus->removeElement($bu)) {
            // set the owning side to null (unless already changed)
            if ($bu->getBus() === $this) {
                $bu->setBus(null);
            }
        }

        return $this;
    }




}
