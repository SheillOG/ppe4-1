<?php

namespace App\Entity;

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

}
