<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ventes
 *
 * @ORM\Table(name="ventes", indexes={@ORM\Index(name="idAgent", columns={"idAgent"}), @ORM\Index(name="idClient", columns={"idClient"})})
 * @ORM\Entity
 */
class Ventes
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateVente", type="string", length=50, nullable=true)
     */
    private $datevente;

    /**
     * @var string
     *
     * @ORM\Column(name="prixVente", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $prixvente;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var \ComptesAgents
     *
     * @ORM\ManyToOne(targetEntity="ComptesAgents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAgent", referencedColumnName="idAgent")
     * })
     */
    private $idagent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Produits", mappedBy="idvente")
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdvente(): ?int
    {
        return $this->idvente;
    }

    public function getDatevente(): ?string
    {
        return $this->datevente;
    }

    public function setDatevente(?string $datevente): self
    {
        $this->datevente = $datevente;

        return $this;
    }

    public function getPrixvente(): ?string
    {
        return $this->prixvente;
    }

    public function setPrixvente(string $prixvente): self
    {
        $this->prixvente = $prixvente;

        return $this;
    }

    public function getIdclient(): ?Clients
    {
        return $this->idclient;
    }

    public function setIdclient(?Clients $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdagent(): ?ComptesAgents
    {
        return $this->idagent;
    }

    public function setIdagent(?ComptesAgents $idagent): self
    {
        $this->idagent = $idagent;

        return $this;
    }

    /**
     * @return Collection|Produits[]
     */
    public function getIdproduit(): Collection
    {
        return $this->idproduit;
    }

    public function addIdproduit(Produits $idproduit): self
    {
        if (!$this->idproduit->contains($idproduit)) {
            $this->idproduit[] = $idproduit;
            $idproduit->addIdvente($this);
        }

        return $this;
    }

    public function removeIdproduit(Produits $idproduit): self
    {
        if ($this->idproduit->removeElement($idproduit)) {
            $idproduit->removeIdvente($this);
        }

        return $this;
    }

}
