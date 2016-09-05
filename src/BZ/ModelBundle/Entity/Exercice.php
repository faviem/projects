<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercice
 *
 * @ORM\Table(name="exercice")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ExerciceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Exercice
{
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\Requete", mappedBy="exercice")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $requetes;
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ClotureRequete", mappedBy="exercice")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $cloturerequetes;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=5)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="loginpersist", type="string", length=255, nullable=true)
     */
    private $loginpersist;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepersist", type="datetime", nullable=true)
     */
    private $datepersist;
    /**
     * @var string
     *
     * @ORM\Column(name="logindelete", type="string", length=255, nullable=true)
     */
    private $logindelete;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedelete", type="datetime", nullable=true)
     */
    private $datedelete;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="estdelete", type="boolean", nullable=true)
     */
    private $estdelete;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Exercice
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->requetes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cloturerequetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add requetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $requetes
     * @return Exercice
     */
    public function addRequete(\BZ\ModelBundle\Entity\Requete $requetes)
    {
        $this->requetes[] = $requetes;

        return $this;
    }

    /**
     * Remove requetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $requetes
     */
    public function removeRequete(\BZ\ModelBundle\Entity\Requete $requetes)
    {
        $this->requetes->removeElement($requetes);
    }

    /**
     * Get requetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRequetes()
    {
        return $this->requetes;
    }
    
    /**
     * Add cloturerequetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $cloturerequetes
     * @return Exercice
     */
    public function addCloturerequete(\BZ\ModelBundle\Entity\ClotureRequete $cloturerequetes)
    {
        $this->cloturerequetes[] = $cloturerequetes;

        return $this;
    }

    /**
     * Remove cloturerequetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $cloturerequetes
     */
    public function removeCloturerequete(\BZ\ModelBundle\Entity\ClotureRequete $cloturerequetes)
    {
        $this->cloturerequetes->removeElement($cloturerequetes);
    }

    /**
     * Get cloturerequetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCloturerequetes()
    {
        return $this->cloturerequetes;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return Exercice
     */
    public function setLoginpersist($loginpersist)
    {
        $this->loginpersist = $loginpersist;

        return $this;
    }

    /**
     * Get loginpersist
     *
     * @return string 
     */
    public function getLoginpersist()
    {
        return $this->loginpersist;
    }

    /**
     * Set datepersist
     *
     * @param \DateTime $datepersist
     * @return Exercice
     */
    public function setDatepersist($datepersist)
    {
        $this->datepersist = $datepersist;

        return $this;
    }

    /**
     * Get datepersist
     *
     * @return \DateTime 
     */
    public function getDatepersist()
    {
        return $this->datepersist;
    }

    /**
     * Set logindelete
     *
     * @param string $logindelete
     * @return Exercice
     */
    public function setLogindelete($logindelete)
    {
        $this->logindelete = $logindelete;

        return $this;
    }

    /**
     * Get logindelete
     *
     * @return string 
     */
    public function getLogindelete()
    {
        return $this->logindelete;
    }

    /**
     * Set datedelete
     *
     * @param \DateTime $datedelete
     * @return Exercice
     */
    public function setDatedelete($datedelete)
    {
        $this->datedelete = $datedelete;

        return $this;
    }

    /**
     * Get datedelete
     *
     * @return \DateTime 
     */
    public function getDatedelete()
    {
        return $this->datedelete;
    }

    /**
     * Set estdelete
     *
     * @param boolean $estdelete
     * @return Exercice
     */
    public function setEstdelete($estdelete)
    {
        $this->estdelete = $estdelete;

        return $this;
    }

    /**
     * Get estdelete
     *
     * @return boolean 
     */
    public function getEstdelete()
    {
        return $this->estdelete;
    }
}
