<?php

namespace App\Entity;

use App\Repository\ArretsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArretsRepository::class)
 */
class Arrets
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
     * @ORM\ManyToMany(targetEntity=Itineraire::class, inversedBy="arrets")
     */
    private $itiarrest;

    public function __construct()
    {
        $this->itiarrest = new ArrayCollection();
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

    /**
     * @return Collection|Itineraire[]
     */
    public function getItiarrest(): Collection
    {
        return $this->itiarrest;
    }

    public function addItiarrest(Itineraire $itiarrest): self
    {
        if (!$this->itiarrest->contains($itiarrest)) {
            $this->itiarrest[] = $itiarrest;
        }

        return $this;
    }

    public function removeItiarrest(Itineraire $itiarrest): self
    {
        $this->itiarrest->removeElement($itiarrest);

        return $this;
    }
}
