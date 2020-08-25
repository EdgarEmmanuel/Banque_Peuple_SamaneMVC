<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 * @Table(name="ResponsableCompte")
 */
class ResponsableCompte
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
    private $login;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    private $matricule;

    /**
     * @Column(type="integer", nullable=true)
     */
    private $id_employe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getIdEmploye(): ?int
    {
        return $this->id_employe;
    }

    public function setIdEmploye(?int $id_employe): self
    {
        $this->id_employe = $id_employe;

        return $this;
    }
}
