<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonneMorale
 */
abstract class PersonneMorale
{
   
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="raisonsociale", type="string", length=255)
     */
    protected $raisonsociale;

    /**
     * @var string
     *
     * @ORM\Column(name="numifu", type="string", length=255, nullable=true)
     */
    protected $numifu;

    /**
     * @var string
     *
     * @ORM\Column(name="numrccm", type="string", length=255, nullable=true)
     */
    protected $numrccm;

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return PersonneMorale
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set raisonsociale
     *
     * @param string $raisonsociale
     * @return PersonneMorale
     */
    public function setRaisonsociale($raisonsociale)
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * Get raisonsociale
     *
     * @return string 
     */
    public function getRaisonsociale()
    {
        return $this->raisonsociale;
    }

    /**
     * Set numifu
     *
     * @param string $numifu
     * @return PersonneMorale
     */
    public function setNumifu($numifu)
    {
        $this->numifu = $numifu;

        return $this;
    }

    /**
     * Get numifu
     *
     * @return string 
     */
    public function getNumifu()
    {
        return $this->numifu;
    }

    /**
     * Set numrccm
     *
     * @param string $numrccm
     * @return PersonneMorale
     */
    public function setNumrccm($numrccm)
    {
        $this->numrccm = $numrccm;

        return $this;
    }

    /**
     * Get numrccm
     *
     * @return string 
     */
    public function getNumrccm()
    {
        return $this->numrccm;
    }
}
