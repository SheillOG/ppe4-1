<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComptesAgents
 *
 * @ORM\Table(name="comptes_agents", indexes={@ORM\Index(name="idProfil", columns={"idProfil"})})
 * @ORM\Entity
 */
class ComptesAgents
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAgent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idagent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=75, nullable=true)
     */
    private $password;

    /**
     * @var \Profil
     *
     * @ORM\ManyToOne(targetEntity="Profil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProfil", referencedColumnName="idProfil")
     * })
     */
    private $idprofil;


}
