<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity(repositoryClass=EmployesRepository::class)
 */
class Employes
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Column(type="integer", nullable=true)
     */
    private $id_agence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getIdAgence(): ?int
    {
        return $this->id_agence;
    }

    public function setIdAgence(?int $id_agence): self
    {
        $this->id_agence = $id_agence;

        return $this;
    }
}
