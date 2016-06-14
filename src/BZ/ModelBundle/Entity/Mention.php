<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mention
 *
 * @ORM\Table(name="mention")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\MentionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Mention
{
     /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ClotureRequete", mappedBy="mention")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $cloturerequetes;
     /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ReponseTraitementRequete", mappedBy="mention")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $reponsetraitementrequete;
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
     * @ORM\Column(name="libelle", type="string", length=255)
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
     * @return Mention
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
        $this->cloturerequetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cloturerequetes
     *
     * @param \BZ\ModelBundle\Entity\ClotureRequete $cloturerequetes
     * @return Mention
     */
    public function addCloturerequete(\BZ\ModelBundle\Entity\ClotureRequete $cloturerequetes)
    {
        $this->cloturerequetes[] = $cloturerequetes;

        return $this;
    }

    /**
     * Remove cloturerequetes
     *
     * @param \BZ\ModelBundle\Entity\ClotureRequete $cloturerequetes
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
     * @return Mention
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
     * @return Mention
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
     * @return Mention
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
     * @return Mention
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
     * @return Mention
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

    /**
     * Add reponsetraitementrequete
     *
     * @param \BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete
     * @return Mention
     */
    public function addReponseusagerclient(\BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete)
    {
        $this->reponsetraitementrequete[] = $reponsetraitementrequete;

        return $this;
    }

    /**
     * Remove reponsetraitementrequete
     *
     * @param \BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete
     */
    public function removeReponseusagerclient(\BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete)
    {
        $this->reponsetraitementrequete->removeElement($reponsetraitementrequete);
    }

    /**
     * Get reponsetraitementrequete
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponseusagerclients()
    {
        return $this->reponsetraitementrequete;
    }
}
