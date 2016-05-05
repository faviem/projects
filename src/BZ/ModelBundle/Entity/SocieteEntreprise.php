<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BZ\ModelBundle\Entity\PersonneMorale;
/**
 * SocieteEntreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\SocieteEntrepriseRepository")
 *  @ORM\HasLifecycleCallbacks()
 */
class SocieteEntreprise extends PersonneMorale
{
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\UsagerClient", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false) 
    */
    private $usagerclient;
    
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
     * @ORM\Column(name="domaineactivite", type="string", length=255)
     */
    private $domaineactivite;


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
     * Set domaineactivite
     *
     * @param string $domaineactivite
     * @return SocieteEntreprise
     */
    public function setDomaineactivite($domaineactivite)
    {
        $this->domaineactivite = $domaineactivite;

        return $this;
    }

    /**
     * Get domaineactivite
     *
     * @return string 
     */
    public function getDomaineactivite()
    {
        return $this->domaineactivite;
    }

    /**
     * Set usagerclient
     *
     * @param \BZ\ModelBundle\Entity\UsagerClient $usagerclient
     * @return SocieteEntreprise
     */
    public function setUsagerclient(\BZ\ModelBundle\Entity\UsagerClient $usagerclient)
    {
        $this->usagerclient = $usagerclient;

        return $this;
    }

    /**
     * Get usagerclient
     *
     * @return \BZ\ModelBundle\Entity\UsagerClient 
     */
    public function getUsagerclient()
    {
        return $this->usagerclient;
    }
}
