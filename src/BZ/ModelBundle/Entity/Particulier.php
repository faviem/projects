<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use BZ\ModelBundle\Entity\PersonnePhysique;

/**
 * Particulier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ParticulierRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Particulier extends PersonnePhysique
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
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;


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
     * Set profession
     *
     * @param string $profession
     * @return Particulier
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set usagerclient
     *
     * @param \BZ\ModelBundle\Entity\UsagerClient $usagerclient
     * @return Particulier
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
