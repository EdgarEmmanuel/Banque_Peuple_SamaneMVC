<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="ClientMoral")
 */
class ClientMoral
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToOne(targetEntity=Clients::class, cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $idClient;

    /**
     * @Column(type="string", length=255)
     */
    private $type_entreprise;

    /**
     * @Column(type="string", length=255)
     */
    private $activite_entreprise;

    /**
     * @Column(type="integer")
     */
    private $ninea;

    /**
     * @Column(type="string", length=255)
     */
    private $adresse_entreprise;

    /**
     * @Column(type="string", length=255)
     */
    private $nom_entreprise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient( $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getTypeEntreprise(): ?string
    {
        return $this->type_entreprise;
    }

    public function setTypeEntreprise(string $type_entreprise): self
    {
        $this->type_entreprise = $type_entreprise;

        return $this;
    }

    public function getActiviteEntreprise(): ?string
    {
        return $this->activite_entreprise;
    }

    public function setActiviteEntreprise(string $activite_entreprise): self
    {
        $this->activite_entreprise = $activite_entreprise;

        return $this;
    }

    public function getNinea(): ?int
    {
        return $this->ninea;
    }

    public function setNinea(int $ninea): self
    {
        $this->ninea = $ninea;

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

    public function getNomEntreprise(): ?string
    {
        return $this->nom_entreprise;
    }

    public function setNomEntreprise(string $nom_entreprise): self
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }
}
