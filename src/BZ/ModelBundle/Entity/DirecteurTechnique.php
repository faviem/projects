<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BZ\ModelBundle\Entity\PersonnePhysique;
/**
 * DirecteurTechnique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\DirecteurTechniqueRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class DirecteurTechnique extends PersonnePhysique
{
     /**
    * @ORM\OneToOne(targetEntity="BZ\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $user;
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\StructureSoustutelle", inversedBy="directeurtechniques")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $structuresoustutelle;
   /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\TraitementRequete", mappedBy="directeurtechnique")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $traitementrequetes;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * Constructor
     */
    public function __construct()
    {
        $this->traitementrequetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \BZ\UserBundle\Entity\User $user
     * @return DirecteurTechnique
     */
    public function setUser(\BZ\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BZ\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set structuresoustutelle
     *
     * @param \BZ\ModelBundle\Entity\StructureSoustutelle $structuresoustutelle
     * @return DirecteurTechnique
     */
    public function setStructuresoustutelle(\BZ\ModelBundle\Entity\StructureSoustutelle $structuresoustutelle = null)
    {
        $this->structuresoustutelle = $structuresoustutelle;

        return $this;
    }

    /**
     * Get structuresoustutelle
     *
     * @return \BZ\ModelBundle\Entity\StructureSoustutelle 
     */
    public function getStructuresoustutelle()
    {
        return $this->structuresoustutelle;
    }

    /**
     * Add traitementrequetes
     *
     * @param \BZ\ModelBundle\Entity\TraitementRequete $traitementrequetes
     * @return DirecteurTechnique
     */
    public function addTraitementrequete(\BZ\ModelBundle\Entity\TraitementRequete $traitementrequetes)
    {
        $this->traitementrequetes[] = $traitementrequetes;

        return $this;
    }

    /**
     * Remove traitementrequetes
     *
     * @param \BZ\ModelBundle\Entity\TraitementRequete $traitementrequetes
     */
    public function removeTraitementrequete(\BZ\ModelBundle\Entity\TraitementRequete $traitementrequetes)
    {
        $this->traitementrequetes->removeElement($traitementrequetes);
    }

    /**
     * Get traitementrequetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTraitementrequetes()
    {
        return $this->traitementrequetes;
    }

    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return DirecteurTechnique
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
     * @return DirecteurTechnique
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
     * @return DirecteurTechnique
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
     * @return DirecteurTechnique
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
     * @return DirecteurTechnique
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
    
     public function getNomprenom()
    {
        return $this->getNom().'  '.$this->getPrenom();
    }
    
}
