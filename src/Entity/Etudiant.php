<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 * @UniqueEntity("email")
 * @UniqueEntity("telephone")
 * @UniqueEntity("matricule")
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{2,30}$/")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{3,30}$/")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/")
     */
    private $telephone;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $boursier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $loger;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateajout;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $occuper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getBoursier(): ?bool
    {
        return $this->boursier;
    }

    public function setBoursier(?bool $boursier): self
    {
        $this->boursier = $boursier;

        return $this;
    }

    public function getLoger(): ?string
    {
        return $this->loger;
    }

    public function setLoger(?string $loger): self
    {
        $this->loger = $loger;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getOccuper(): ?Chambre
    {
        return $this->occuper;
    }

    public function setOccuper(?Chambre $occuper): self
    {
        $this->occuper = $occuper;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }
}
