<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="ClientIndependant")
 */
class ClientIndependant
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToOne(targetEntity="Clients", cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $idClient;

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
    private $cni;

    /**
     * @Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @Column(type="string", length=255)
     */
    private $activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($idClient): self
    {
        $this->idClient = $idClient;

        return $this;
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

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): self
    {
        $this->cni = $cni;

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

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
}
