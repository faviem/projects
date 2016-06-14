<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultatTraitementRequete
 *
 * @ORM\Table(name="resultattraitementrequete")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ResultatTraitementRequeteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ResultatTraitementRequete
{
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\TraitementRequete", inversedBy="resultattraitementrequetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $traitementrequete;
     /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\FileTraitement", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $fileretraitement;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateResultat", type="datetime")
     */
    private $dateResultat;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireResultat", type="text")
     */
    private $commentaireResultat;

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
     * Set dateResultat
     *
     * @param \DateTime $dateResultat
     * @return ResultatTraitementRequete
     */
    public function setDateResultat($dateResultat)
    {
        $this->dateResultat = $dateResultat;

        return $this;
    }

    /**
     * Get dateResultat
     *
     * @return \DateTime 
     */
    public function getDateResultat()
    {
        return $this->dateResultat;
    }

    /**
     * Set commentaireResultat
     *
     * @param string $commentaireResultat
     * @return ResultatTraitementRequete
     */
    public function setCommentaireResultat($commentaireResultat)
    {
        $this->commentaireResultat = $commentaireResultat;

        return $this;
    }

    /**
     * Get commentaireResultat
     *
     * @return string 
     */
    public function getCommentaireResultat()
    {
        return $this->commentaireResultat;
    }
    /**
     * Set fileretraitement
     *
     * @param \BZ\ModelBundle\Entity\FileTraitement $fileretraitement
     * @return ResultatTraitementRequete
     */
    public function setFileretraitement(\BZ\ModelBundle\Entity\FileTraitement $fileretraitement = null)
    {
        $this->fileretraitement = $fileretraitement;

        return $this;
    }

    /**
     * Get fileretraitement
     *
     * @return \BZ\ModelBundle\Entity\FileTraitement 
     */
    public function getFileretraitement()
    {
        return $this->fileretraitement;
    }
    
     /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return TypeRequete
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
     * @return TypeRequete
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
     * @return TypeRequete
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
     * @return TypeRequete
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
     * @return TypeRequete
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
     * Set traitementrequete
     *
     * @param \BZ\ModelBundle\Entity\TraitementRequete $traitementrequete
     * @return ResultatTraitementRequete
     */
    public function setTraitementrequete(\BZ\ModelBundle\Entity\TraitementRequete $traitementrequete = null)
    {
        $this->traitementrequete = $traitementrequete;

        return $this;
    }

    /**
     * Get traitementrequete
     *
     * @return \BZ\ModelBundle\Entity\TraitementRequete 
     */
    public function getTraitementrequete()
    {
        return $this->traitementrequete;
    }
}
