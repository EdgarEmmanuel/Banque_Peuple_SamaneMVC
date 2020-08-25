<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="Agios")
 */
class Agios
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="float")
     */
    private $montant;

    /**
     * @Column(type="string", length=255)
     */
    private $description;

    /**
     * @Column(type="integer")
     */
    private $enumeration;

    /**
     * @Column(type="date", nullable=true)
     */
    private $date_fin_contexte;

    /**
     * @Column(type="date")
     */
    private $debut_contexte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEnumeration(): ?int
    {
        return $this->enumeration;
    }

    public function setEnumeration(int $enumeration): self
    {
        $this->enumeration = $enumeration;

        return $this;
    }

    public function getDateFinContexte(): ?\DateTimeInterface
    {
        return $this->date_fin_contexte;
    }

    public function setDateFinContexte(?\DateTimeInterface $date_fin_contexte): self
    {
        $this->date_fin_contexte = $date_fin_contexte;

        return $this;
    }

    public function getDebutContexte(): ?\DateTimeInterface
    {
        return $this->debut_contexte;
    }

    public function setDebutContexte(\DateTimeInterface $debut_contexte): self
    {
        $this->debut_contexte = $debut_contexte;

        return $this;
    }
}
