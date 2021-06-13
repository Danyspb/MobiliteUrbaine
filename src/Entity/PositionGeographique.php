<?php

namespace App\Entity;

use App\Repository\PositionGeographiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PositionGeographiqueRepository::class)
 */
class PositionGeographique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\OneToOne(targetEntity=Terminus::class, cascade={"persist", "remove"})
     */
    private $positerm;

    /**
     * @ORM\ManyToMany(targetEntity=Itineraire::class, mappedBy="itiposition")
     */
    private $itineraires;

    public function __construct()
    {
        $this->itineraires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getPositerm(): ?Terminus
    {
        return $this->positerm;
    }

    public function setPositerm(?Terminus $positerm): self
    {
        $this->positerm = $positerm;

        return $this;
    }

    /**
     * @return Collection|Itineraire[]
     */
    public function getItineraires(): Collection
    {
        return $this->itineraires;
    }

    public function addItineraire(Itineraire $itineraire): self
    {
        if (!$this->itineraires->contains($itineraire)) {
            $this->itineraires[] = $itineraire;
            $itineraire->addItiposition($this);
        }

        return $this;
    }

    public function removeItineraire(Itineraire $itineraire): self
    {
        if ($this->itineraires->removeElement($itineraire)) {
            $itineraire->removeItiposition($this);
        }

        return $this;
    }
}
