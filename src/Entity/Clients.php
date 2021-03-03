<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClient", type="string", length=50, nullable=false)
     */
    private $nomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomClient", type="string", length=50, nullable=false)
     */
    private $prenomclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailClient", type="string", length=50, nullable=true)
     */
    private $emailclient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephoneClient", type="string", length=50, nullable=true)
     */
    private $telephoneclient;


}
