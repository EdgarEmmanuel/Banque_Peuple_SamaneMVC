<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="Comptes")
 */
class Comptes
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $date_ouverture;

    /**
     * @Column(type="string", length=255)
     */
    private $num_compte;

    /**
     * @Column(type="integer")
     */
    private $cle_rib;

    /**
     * @ManyToOne(targetEntity="Clients")
     * @JoinColumn(nullable=false)
     */
    private $idClient;

    /**
     * @ManyToOne(targetEntity="Agences")
     * @JoinColumn(nullable=false)
     */
    private $idAgence;

    /**
     * @ManyToOne(targetEntity="ResponsableCompte")
     * @JoinColumn(nullable=false)
     */
    private $id_respo_compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->date_ouverture;
    }

    public function setDateOuverture(string $date_ouverture): self
    {
        $this->date_ouverture = $date_ouverture;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->num_compte;
    }

    public function setNumCompte(string $num_compte): self
    {
        $this->num_compte = $num_compte;

        return $this;
    }

    public function getCleRib(): ?int
    {
        return $this->cle_rib;
    }

    public function setCleRib(int $cle_rib): self
    {
        $this->cle_rib = $cle_rib;

        return $this;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdAgence()
    {
        return $this->idAgence;
    }

    public function setIdAgence(?Agences $idAgence): self
    {
        $this->idAgence = $idAgence;

        return $this;
    }

    public function getIdRespoCompte()
    {
        return $this->id_respo_compte;
    }

    public function setIdRespoCompte(?ResponsableCompte $id_respo_compte): self
    {
        $this->id_respo_compte = $id_respo_compte;

        return $this;
    }
}
