<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BZ\ModelBundle\Entity\PersonneMorale;
/**
 * StructureSoustutelle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\StructureSoustutelleRepository")
 *  @ORM\HasLifecycleCallbacks()
 */
class StructureSoustutelle extends PersonneMorale
{
     /**
     * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\AdresseContact",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true) 
     */
    private $adressecontact;
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\DirecteurTechnique", mappedBy="structuresoustutelle")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $directeurtechniques;
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\Requete", mappedBy="structuresoustutelle")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $requetes;
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
        $this->directeurtechniques = new \Doctrine\Common\Collections\ArrayCollection();
        $this->requetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set adressecontact
     *
     * @param \BZ\ModelBundle\Entity\AdresseContact $adressecontact
     * @return StructureSoustutelle
     */
    public function setAdressecontact(\BZ\ModelBundle\Entity\AdresseContact $adressecontact = null)
    {
        $this->adressecontact = $adressecontact;

        return $this;
    }

    /**
     * Get adressecontact
     *
     * @return \BZ\ModelBundle\Entity\AdresseContact 
     */
    public function getAdressecontact()
    {
        return $this->adressecontact;
    }

    /**
     * Add directeurtechniques
     *
     * @param \BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechniques
     * @return StructureSoustutelle
     */
    public function addDirecteurtechnique(\BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechniques)
    {
        $this->directeurtechniques[] = $directeurtechniques;

        return $this;
    }

    /**
     * Remove directeurtechniques
     *
     * @param \BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechniques
     */
    public function removeDirecteurtechnique(\BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechniques)
    {
        $this->directeurtechniques->removeElement($directeurtechniques);
    }

    /**
     * Get directeurtechniques
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirecteurtechniques()
    {
        return $this->directeurtechniques;
    }

    /**
     * Add requetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $requetes
     * @return StructureSoustutelle
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
     * Set loginpersist
     *
     * @param string $loginpersist
     * @return strcuturesoustutelles
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
     * @return strcuturesoustutelles
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
     * @return strcuturesoustutelles
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
     * @return strcuturesoustutelles
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
     * @return strcuturesoustutelles
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
    
    public function getDesignationStructure()
    {
        return $this->getNom().' ('.$this->getRaisonsociale().')';
    }
}
