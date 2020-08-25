<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="ClientSalarie")
 */
class ClientSalarie
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @Column(type="string", length=255)
     */
    private $profession;

    /**
     * @Column(type="string", length=255)
     */
    private $cni;

    /**
     * @Column(type="string", length=255)
     */
    private $nom_entreprise;

    /**
     * @Column(type="string", length=255)
     */
    private $adresse_entreprise;

    /**
     * @OneToOne(targetEntity=Clients::class, cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $idClient;

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

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

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

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresse_entreprise;
    }

    public function setAdresseEntreprise(string $adresse_entreprise): self
    {
        $this->adresse_entreprise = $adresse_entreprise;

        return $this;
    }

    public function getIdClient(): ?Clients
    {
        return $this->idClient;
    }

    public function setIdClient(Clients $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }
}
