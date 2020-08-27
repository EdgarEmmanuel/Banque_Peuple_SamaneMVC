<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="CompteBloque")
 */
class CompteBloque
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @OneToOne(targetEntity="Comptes", cascade={"persist", "remove"})
     * @JoinColumn(nullable=false)
     */
    private $id_compte;

    /**
     * @Column(type="integer")
     */
    private $solde;

    /**
     * @Column(type="string")
     */
    private $date_deblocage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCompte()
    {
        return $this->id_compte;
    }

    public function setIdCompte($id_compte): self
    {
        $this->id_compte = $id_compte;

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

    public function getDateDeblocage(): ?string
    {
        return $this->date_deblocage;
    }

    public function setDateDeblocage(string $date_deblocage): self
    {
        $this->date_deblocage = $date_deblocage;

        return $this;
    }
}
