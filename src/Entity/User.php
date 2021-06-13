<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("telephone",message="le numero existe deja !!! ")
 * @UniqueEntity("cni", message="le cni existe deja !!! ")
 * @UniqueEntity("numpermis",message="le numero existe deja")
 * @UniqueEntity("login", message="l'utilisateur existe deja !!! ")
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
     *
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="9",minMessage="Numero Incorrect !!")
     * @Assert\Length(max="9",maxMessage="Numero Incorrect !!")
     *
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="13", minMessage="CNI Incorrect !!")
     * @Assert\Length(max="13", maxMessage="CNI Incorrect !!")
     *
     */
    private $cni;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numpermis;

    /**
     * @ORM\ManyToOne(targetEntity=Bus::class)
     */
    private $userbus;

    /**
     * @ORM\OneToMany(targetEntity=Itineraire::class, mappedBy="user")
     */
    private $useriti;

    /**
     * @ORM\ManyToMany(targetEntity=Terminus::class, inversedBy="users")
     */
    private $userterm;

    /**
     * @ORM\OneToOne(targetEntity=Roles::class, cascade={"persist", "remove"})
     */
    private $useroles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="posuser")
     */
    private $poste;



    public function __construct()
    {
        $this->useriti = new ArrayCollection();
        $this->userterm = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getNumpermis(): ?string
    {
        return $this->numpermis;
    }

    public function setNumpermis(?string $numpermis): self
    {
        $this->numpermis = $numpermis;

        return $this;
    }

    public function getUserbus(): ?Bus
    {
        return $this->userbus;
    }

    public function setUserbus(?Bus $userbus): self
    {
        $this->userbus = $userbus;

        return $this;
    }

    /**
     * @return Collection|Itineraire[]
     */
    public function getUseriti(): Collection
    {
        return $this->useriti;
    }

    public function addUseriti(Itineraire $useriti): self
    {
        if (!$this->useriti->contains($useriti)) {
            $this->useriti[] = $useriti;
            $useriti->setUser($this);
        }

        return $this;
    }

    public function removeUseriti(Itineraire $useriti): self
    {
        if ($this->useriti->removeElement($useriti)) {
            // set the owning side to null (unless already changed)
            if ($useriti->getUser() === $this) {
                $useriti->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Terminus[]
     */
    public function getUserterm(): Collection
    {
        return $this->userterm;
    }

    public function addUserterm(Terminus $userterm): self
    {
        if (!$this->userterm->contains($userterm)) {
            $this->userterm[] = $userterm;
        }

        return $this;
    }

    public function removeUserterm(Terminus $userterm): self
    {
        $this->userterm->removeElement($userterm);

        return $this;
    }

    public function getUseroles(): ?Roles
    {
        return $this->useroles;
    }

    public function setUseroles(?Roles $useroles): self
    {
        $this->useroles = $useroles;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }
}
