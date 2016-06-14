<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TraitementRequete
 *
 * @ORM\Table(name="traitementrequete")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\TraitementRequeteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TraitementRequete
{
     /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\ReponseTraitementRequete", mappedBy="traitementrequete")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $reponsetraitementrequete;
   /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Requete", inversedBy="traitementrequetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $requete;
   /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\DirecteurTechnique", inversedBy="traitementrequetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $directeurtechnique;
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\ResultatTraitementRequete", mappedBy="traitementrequete")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $resultattraitementrequetes;
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
     * @ORM\Column(name="dateLancement", type="datetime")
     */
    private $dateLancement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estResolu", type="boolean", nullable=true)
     */
    private $estResolu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateResolue", type="datetime", nullable=true)
     */
    private $dateResolue;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireLancement", type="text")
     */
    private $commentaireLancement;

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
     * Set dateLancement
     *
     * @param \DateTime $dateLancement
     * @return TraitementRequete
     */
    public function setDateLancement($dateLancement)
    {
        $this->dateLancement = $dateLancement;

        return $this;
    }

    /**
     * Get dateLancement
     *
     * @return \DateTime 
     */
    public function getDateLancement()
    {
        return $this->dateLancement;
    }

    /**
     * Set delaisprevu
     *
     * @param integer $delaisprevu
     * @return TraitementRequete
     */
    public function setDelaisprevu($delaisprevu)
    {
        $this->delaisprevu = $delaisprevu;

        return $this;
    }

    /**
     * Get delaisprevu
     *
     * @return integer 
     */
    public function getDelaisprevu()
    {
        return $this->delaisprevu;
    }

    /**
     * Set dateFinprevue
     *
     * @param \DateTime $dateFinprevue
     * @return TraitementRequete
     */
    public function setDateFinprevue($dateFinprevue)
    {
        $this->dateFinprevue = $dateFinprevue;

        return $this;
    }

    /**
     * Get dateFinprevue
     *
     * @return \DateTime 
     */
    public function getDateFinprevue()
    {
        return $this->dateFinprevue;
    }

    /**
     * Set estResolu
     *
     * @param boolean $estResolu
     * @return TraitementRequete
     */
    public function setEstResolu($estResolu)
    {
        $this->estResolu = $estResolu;

        return $this;
    }

    /**
     * Get estResolu
     *
     * @return boolean 
     */
    public function getEstResolu()
    {
        return $this->estResolu;
    }

    /**
     * Set dateResolue
     *
     * @param \DateTime $dateResolue
     * @return TraitementRequete
     */
    public function setDateResolue($dateResolue)
    {
        $this->dateResolue = $dateResolue;

        return $this;
    }

    /**
     * Get dateResolue
     *
     * @return \DateTime 
     */
    public function getDateResolue()
    {
        return $this->dateResolue;
    }

    /**
     * Set commentaireLancement
     *
     * @param string $commentaireLancement
     * @return TraitementRequete
     */
    public function setCommentaireLancement($commentaireLancement)
    {
        $this->commentaireLancement = $commentaireLancement;

        return $this;
    }

    /**
     * Get commentaireLancement
     *
     * @return string 
     */
    public function getCommentaireLancement()
    {
        return $this->commentaireLancement;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resultattraitementrequete = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reponsetraitementrequete
     *
     * @param \BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete
     * @return TraitementRequete
     */
    public function setReponsetraitementrequete(\BZ\ModelBundle\Entity\ReponseTraitementRequete $reponsetraitementrequete = null)
    {
        $this->reponsetraitementrequete = $reponsetraitementrequete;

        return $this;
    }

    /**
     * Get reponsetraitementrequete
     *
     * @return \BZ\ModelBundle\Entity\ReponseTraitementRequete 
     */
    public function getReponsetraitementrequete()
    {
        return $this->reponsetraitementrequete;
    }

    /**
     * Set requete
     *
     * @param \BZ\ModelBundle\Entity\Requete $requete
     * @return TraitementRequete
     */
    public function setRequete(\BZ\ModelBundle\Entity\Requete $requete = null)
    {
        $this->requete = $requete;

        return $this;
    }

    /**
     * Get requete
     *
     * @return \BZ\ModelBundle\Entity\Requete 
     */
    public function getRequete()
    {
        return $this->requete;
    }

    /**
     * Set directeurtechnique
     *
     * @param \BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechnique
     * @return TraitementRequete
     */
    public function setDirecteurtechnique(\BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechnique = null)
    {
        $this->directeurtechnique = $directeurtechnique;

        return $this;
    }

    /**
     * Get directeurtechnique
     *
     * @return \BZ\ModelBundle\Entity\DirecteurTechnique 
     */
    public function getDirecteurtechnique()
    {
        return $this->directeurtechnique;
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
     * Add resultattraitementrequetes
     *
     * @param \BZ\ModelBundle\Entity\ResultatTraitementRequete $resultattraitementrequetes
     * @return TraitementRequete
     */
    public function addResultattraitementrequete(\BZ\ModelBundle\Entity\ResultatTraitementRequete $resultattraitementrequetes)
    {
        $this->resultattraitementrequetes[] = $resultattraitementrequetes;

        return $this;
    }

    /**
     * Remove resultattraitementrequetes
     *
     * @param \BZ\ModelBundle\Entity\ResultatTraitementRequete $resultattraitementrequetes
     */
    public function removeResultattraitementrequete(\BZ\ModelBundle\Entity\ResultatTraitementRequete $resultattraitementrequetes)
    {
        $this->resultattraitementrequetes->removeElement($resultattraitementrequetes);
    }

    /**
     * Get resultattraitementrequetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResultattraitementrequetes()
    {
        return $this->resultattraitementrequetes;
    }
}
