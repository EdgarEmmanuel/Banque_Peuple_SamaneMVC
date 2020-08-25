<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass=CompteEpargneRepository::class)
 */
class CompteEpargne
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToOne(targetEntity=Comptes::class, cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $compte_id;

    /**
     * @Column(type="float")
     */
    private $solde;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteId(): ?Comptes
    {
        return $this->compte_id;
    }

    public function setCompteId(Comptes $compte_id): self
    {
        $this->compte_id = $compte_id;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }
}
