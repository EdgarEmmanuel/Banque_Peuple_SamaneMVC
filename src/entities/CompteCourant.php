<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="CompteCourant")
 */
class CompteCourant
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
    private $adresse_employeur;

    /**
     * @Column(type="string", length=255)
     */
    private $nom_entreprise;

    /**
     * @Column(type="string", length=255)
     */
    private $raison_social;

    /**
     * @Column(type="integer")
     */
    private $solde;

    /**
     * @OneToOne(targetEntity=Comptes::class, cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $id_compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(string $adresse_employeur): self
    {
        $this->adresse_employeur = $adresse_employeur;

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

    public function getRaisonSocial(): ?string
    {
        return $this->raison_social;
    }

    public function setRaisonSocial(string $raison_social): self
    {
        $this->raison_social = $raison_social;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getIdCompte(): ?Comptes
    {
        return $this->id_compte;
    }

    public function setIdCompte(Comptes $id_compte): self
    {
        $this->id_compte = $id_compte;

        return $this;
    }
}
