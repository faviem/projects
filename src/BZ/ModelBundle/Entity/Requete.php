<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requete
 *
 * @ORM\Table(name="requete")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\RequeteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Requete
{
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\FileRequete", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $filerequete;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Particulier", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $particulier;
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\ClotureRequete", mappedBy="cloturerequete")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $cloturerequete;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\SocieteEntreprise", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $societeentreprise;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\TypeRequete", inversedBy="requetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $typerequete;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Alerte", inversedBy="requetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $alerte;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Exercice", inversedBy="requetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $exercice;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\ModeSaisine", inversedBy="requetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $modesaisine;
     /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\StructureSoustutelle", inversedBy="requetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $structuresoustutelle;
     /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\TraitementRequete", mappedBy="requete")
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
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmise", type="datetime")
     */
    private $dateEmise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateConsulter", type="datetime",nullable=true)
     */
    private $dateConsulter;

    /**
     * @var integer
     *
     * @ORM\Column(name="delaitraitementprevu", type="integer",nullable=true)
     */
    private $delaitraitementprevu;

    /**
     * @var string
     *
     * @ORM\Column(name="typeusagerclient", type="string", length=255)
     */
    private $typeusagerclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCloturePrevue", type="datetime",nullable=true)
     */
    private $dateCloturePrevue;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCloturer", type="datetime",nullable=true)
     */
    private $dateCloturer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estFonder", type="boolean",nullable=true)
     */
    private $estFonder;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="estResolu", type="boolean")
     */
    private $estResolu;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="estentraitement", type="boolean",nullable=true)
     */
    private $estentraitement;

    /**
     * @var string
     *
     * @ORM\Column(name="codeRecepisse", type="string", length=255,nullable=true)
     */
    private $codeRecepisse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estAvorterUsagerclient", type="boolean")
     */
    private $estAvorterUsagerclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAvorterUsagerclient", type="datetime",nullable=true)
     */
    private $dateAvorterUsagerclient;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireAvorterUsagerclient", type="text",nullable=true)
     */
    private $commentaireAvorterUsagerclient;
    
    /**
     * @var string
     *
     * @ORM\Column(name="commentaireUsagerclient", type="text")
     */
    private $commentaireUsagerclient;
    /**
     * @var string
     *
     * @ORM\Column(name="commentaireVulnerable", type="text", nullable=true)
     */
    private $commentaireVulnerable;

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
     * Set dateEmise
     *
     * @param \DateTime $dateEmise
     * @return Requete
     */
    public function setDateEmise($dateEmise)
    {
        $this->dateEmise = $dateEmise;

        return $this;
    }

    /**
     * Get dateEmise
     *
     * @return \DateTime 
     */
    public function getDateEmise()
    {
        return $this->dateEmise;
    }

    /**
     * Set dateConsulter
     *
     * @param \DateTime $dateConsulter
     * @return Requete
     */
    public function setDateConsulter($dateConsulter)
    {
        $this->dateConsulter = $dateConsulter;

        return $this;
    }

    /**
     * Get dateConsulter
     *
     * @return \DateTime 
     */
    public function getDateConsulter()
    {
        return $this->dateConsulter;
    }

    /**
     * Set delaitraitementprevu
     *
     * @param integer $delaitraitementprevu
     * @return Requete
     */
    public function setDelaitraitementprevu($delaitraitementprevu)
    {
        $this->delaitraitementprevu = $delaitraitementprevu;

        return $this;
    }

    /**
     * Get delaitraitementprevu
     *
     * @return integer 
     */
    public function getDelaitraitementprevu()
    {
        return $this->delaitraitementprevu;
    }

    /**
     * Set typeusagerclient
     *
     * @param string $typeusagerclient
     * @return Requete
     */
    public function setTypeusagerclient($typeusagerclient)
    {
        $this->typeusagerclient = $typeusagerclient;

        return $this;
    }

    /**
     * Get typeusagerclient
     *
     * @return string 
     */
    public function getTypeusagerclient()
    {
        return $this->typeusagerclient;
    }

    /**
     * Set dateCloturePrevue
     *
     * @param \DateTime $dateCloturePrevue
     * @return Requete
     */
    public function setDateCloturePrevue($dateCloturePrevue)
    {
        $this->dateCloturePrevue = $dateCloturePrevue;

        return $this;
    }

    /**
     * Get dateCloturePrevue
     *
     * @return \DateTime 
     */
    public function getDateCloturePrevue()
    {
        return $this->dateCloturePrevue;
    }

    /**
     * Set estFonder
     *
     * @param boolean $estFonder
     * @return Requete
     */
    public function setEstFonder($estFonder)
    {
        $this->estFonder = $estFonder;

        return $this;
    }

    /**
     * Get estFonder
     *
     * @return boolean 
     */
    public function getEstFonder()
    {
        return $this->estFonder;
    }

    /**
     * Set codeRecepisse
     *
     * @param string $codeRecepisse
     * @return Requete
     */
    public function setCodeRecepisse($codeRecepisse)
    {
        $this->codeRecepisse = $codeRecepisse;

        return $this;
    }

    /**
     * Get codeRecepisse
     *
     * @return string 
     */
    public function getCodeRecepisse()
    {
        return $this->codeRecepisse;
    }

    /**
     * Set estAvorterUsagerclient
     *
     * @param boolean $estAvorterUsagerclient
     * @return Requete
     */
    public function setEstAvorterUsagerclient($estAvorterUsagerclient)
    {
        $this->estAvorterUsagerclient = $estAvorterUsagerclient;

        return $this;
    }

    /**
     * Get estAvorterUsagerclient
     *
     * @return boolean 
     */
    public function getEstAvorterUsagerclient()
    {
        return $this->estAvorterUsagerclient;
    }

    /**
     * Set dateAvorterUsagerclient
     *
     * @param \DateTime $dateAvorterUsagerclient
     * @return Requete
     */
    public function setDateAvorterUsagerclient($dateAvorterUsagerclient)
    {
        $this->dateAvorterUsagerclient = $dateAvorterUsagerclient;

        return $this;
    }

    /**
     * Get dateAvorterUsagerclient
     *
     * @return \DateTime 
     */
    public function getDateAvorterUsagerclient()
    {
        return $this->dateAvorterUsagerclient;
    }

    /**
     * Set commentaireUsagerclient
     *
     * @param string $commentaireUsagerclient
     * @return Requete
     */
    public function setCommentaireUsagerclient($commentaireUsagerclient)
    {
        $this->commentaireUsagerclient = $commentaireUsagerclient;

        return $this;
    }

    /**
     * Get commentaireUsagerclient
     *
     * @return string 
     */
    public function getCommentaireUsagerclient()
    {
        return $this->commentaireUsagerclient;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->traitementrequetes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->avantEnregistrement();
    }

    /**
     * Set estResolu
     *
     * @param boolean $estResolu
     * @return Requete
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
     * Set filerequete
     *
     * @param \BZ\ModelBundle\Entity\FileRequete $filerequete
     * @return Requete
     */
    public function setFilerequete(\BZ\ModelBundle\Entity\FileRequete $filerequete = null)
    {
        $this->filerequete = $filerequete;

        return $this;
    }

    /**
     * Get filerequete
     *
     * @return \BZ\ModelBundle\Entity\FileRequete 
     */
    public function getFilerequete()
    {
        return $this->filerequete;
    }

    /**
     * Set particulier
     *
     * @param \BZ\ModelBundle\Entity\Particulier $particulier
     * @return Requete
     */
    public function setParticulier(\BZ\ModelBundle\Entity\Particulier $particulier = null)
    {
        $this->particulier = $particulier;

        return $this;
    }

    /**
     * Get particulier
     *
     * @return \BZ\ModelBundle\Entity\Particulier 
     */
    public function getParticulier()
    {
        return $this->particulier;
    }

    /**
     * Set cloturerequete
     *
     * @param \BZ\ModelBundle\Entity\ClotureRequete $cloturerequete
     * @return Requete
     */
    public function setCloturerequete(\BZ\ModelBundle\Entity\ClotureRequete $cloturerequete = null)
    {
        $this->cloturerequete = $cloturerequete;

        return $this;
    }

    /**
     * Get cloturerequete
     *
     * @return \BZ\ModelBundle\Entity\ClotureRequete 
     */
    public function getCloturerequete()
    {
        return $this->cloturerequete;
    }

    /**
     * Set societeentreprise
     *
     * @param \BZ\ModelBundle\Entity\SoceteEntreprise $societeentreprise
     * @return Requete
     */
    public function setSocieteentreprise(\BZ\ModelBundle\Entity\SocieteEntreprise $societeentreprise = null)
    {
        $this->societeentreprise = $societeentreprise;

        return $this;
    }

    /**
     * Get societeentreprise
     *
     * @return \BZ\ModelBundle\Entity\SoceteEntreprise 
     */
    public function getSocieteentreprise()
    {
        return $this->societeentreprise;
    }

    /**
     * Set typerequete
     *
     * @param \BZ\ModelBundle\Entity\TypeRequete $typerequete
     * @return Requete
     */
    public function setTyperequete(\BZ\ModelBundle\Entity\TypeRequete $typerequete = null)
    {
        $this->typerequete = $typerequete;

        return $this;
    }

    /**
     * Get typerequete
     *
     * @return \BZ\ModelBundle\Entity\TypeRequete 
     */
    public function getTyperequete()
    {
        return $this->typerequete;
    }

    /**
     * Set alerte
     *
     * @param \BZ\ModelBundle\Entity\Alerte $alerte
     * @return Requete
     */
    public function setAlerte(\BZ\ModelBundle\Entity\Alerte $alerte = null)
    {
        $this->alerte = $alerte;

        return $this;
    }

    /**
     * Get alerte
     *
     * @return \BZ\ModelBundle\Entity\Alerte 
     */
    public function getAlerte()
    {
        return $this->alerte;
    }
    
    /**
     * Set exercice
     *
     * @param \BZ\ModelBundle\Entity\Exercice $exercice
     * @return Requete
     */
    public function setExercice(\BZ\ModelBundle\Entity\Exercice $exercice = null)
    {
        $this->exercice = $exercice;

        return $this;
    }

    /**
     * Get exercice
     *
     * @return \BZ\ModelBundle\Entity\Exercice 
     */
    public function getExercice()
    {
        return $this->exercice;
    }

    /**
     * Set structuresoustutelle
     *
     * @param \BZ\ModelBundle\Entity\StructureSoustutelle $structuresoustutelle
     * @return Requete
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
     * @return Requete
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
     * Set modesaisine
     *
     * @param \BZ\ModelBundle\Entity\ModeSaisine $modesaisine
     * @return Requete
     */
    public function setModesaisine(\BZ\ModelBundle\Entity\ModeSaisine $modesaisine = null)
    {
        $this->modesaisine = $modesaisine;

        return $this;
    }

    /**
     * Get modesaisine
     *
     * @return \BZ\ModelBundle\Entity\ModeSaisine 
     */
    public function getModesaisine()
    {
        return $this->modesaisine;
    }
    /**
    * @ORM\PrePersist
    */
   public function avantEnregistrement()
   {
     $this->setEstAvorterUsagerclient(false);
     $this->setEstResolu(false);
    // $this->setEstFonder(true);
     $this->setDateEmise(new \Datetime());
   }
  
  

    /**
     * Set dateCloturer
     *
     * @param \DateTime $dateCloturer
     * @return Requete
     */
    public function setDateCloturer($dateCloturer)
    {
        $this->dateCloturer = $dateCloturer;

        return $this;
    }

    /**
     * Get dateCloturer
     *
     * @return \DateTime 
     */
    public function getDateCloturer()
    {
        return $this->dateCloturer;
    }

    /**
     * Set commentaireAvorterUsagerclient
     *
     * @param string $commentaireAvorterUsagerclient
     * @return Requete
     */
    public function setCommentaireAvorterUsagerclient($commentaireAvorterUsagerclient)
    {
        $this->commentaireAvorterUsagerclient = $commentaireAvorterUsagerclient;

        return $this;
    }

    /**
     * Get commentaireAvorterUsagerclient
     *
     * @return string 
     */
    public function getCommentaireAvorterUsagerclient()
    {
        return $this->commentaireAvorterUsagerclient;
    }
    
    /**
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return Requete
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
     * @return Requete
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
     * @return Requete
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
     * @return Requete
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
     * @return Requete
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
     * Set commentaireVulnerable
     *
     * @param string $commentaireVulnerable
     * @return Requete
     */
    public function setCommentaireVulnerable($commentaireVulnerable)
    {
        $this->commentaireVulnerable = $commentaireVulnerable;

        return $this;
    }

    /**
     * Get commentaireVulnerable
     *
     * @return string 
     */
    public function getCommentaireVulnerable()
    {
        return $this->commentaireVulnerable;
    }

    /**
     * Set estentraitement
     *
     * @param boolean $estentraitement
     * @return Requete
     */
    public function setEstentraitement($estentraitement)
    {
        $this->estentraitement = $estentraitement;

        return $this;
    }

    /**
     * Get estentraitement
     *
     * @return boolean 
     */
    public function getEstentraitement()
    {
        return $this->estentraitement;
    }
}
