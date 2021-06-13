<?php

namespace App\Entity;

use App\Repository\ItineraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItineraireRepository::class)
 */
class Itineraire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $horaire;



    /**
     * @ORM\ManyToMany(targetEntity=PositionGeographique::class, inversedBy="itineraires")
     */
    private $itiposition;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="useriti")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=Arrets::class, mappedBy="itiarrest")
     */
    private $arrets;

    /**
     * @ORM\ManyToOne(targetEntity=LigneBus::class, inversedBy="ligneiti")
     */
    private $ligneBus;

    /**
     * @ORM\ManyToOne(targetEntity=Bus::class, inversedBy="bus")
     */
    private $bus;



    public function __construct()
    {
        $this->itiposition = new ArrayCollection();
        $this->arrets = new ArrayCollection();
        $this->buses = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraire(): ?\DateTimeInterface
    {
        return $this->horaire;
    }

    public function setHoraire(\DateTimeInterface $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }



    /**
     * @return Collection|PositionGeographique[]
     */
    public function getItiposition(): Collection
    {
        return $this->itiposition;
    }

    public function addItiposition(PositionGeographique $itiposition): self
    {
        if (!$this->itiposition->contains($itiposition)) {
            $this->itiposition[] = $itiposition;
        }

        return $this;
    }

    public function removeItiposition(PositionGeographique $itiposition): self
    {
        $this->itiposition->removeElement($itiposition);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Arrets[]
     */
    public function getArrets(): Collection
    {
        return $this->arrets;
    }

    public function addArret(Arrets $arret): self
    {
        if (!$this->arrets->contains($arret)) {
            $this->arrets[] = $arret;
            $arret->addItiarrest($this);
        }

        return $this;
    }

    public function removeArret(Arrets $arret): self
    {
        if ($this->arrets->removeElement($arret)) {
            $arret->removeItiarrest($this);
        }

        return $this;
    }

    public function getLigneBus(): ?LigneBus
    {
        return $this->ligneBus;
    }

    public function setLigneBus(?LigneBus $ligneBus): self
    {
        $this->ligneBus = $ligneBus;

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
    

}
