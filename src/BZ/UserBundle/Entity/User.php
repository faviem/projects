<?php
/*
 * This file is part of the Gestion Internet Game Center package.
 *
 * (c) Blue Zone <contact@bluezone.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace BZ\UserBundle\Entity;

/**
 * Load default users
 *
 * @author Jacques Adjahoungbo <tocicason@hotmail.fr>
 */

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class User extends BaseUser
{
     /**
     * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\AdresseContact", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true) 
     */
    private $adressecontact;

    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\DirecteurTechnique", cascade={"persist"}, inversedBy="user")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $directeurtechnique;
    
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Agent",  inversedBy="user")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $agent;
    
     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Profil")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $profil;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\FileIdentite", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $fileidentite;
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="user_isconnect", type="string", length=1, nullable=true)
     */
    private $isconnect;

    /**
     * Constructor
     */
    public function __construct()
    {
         parent::__construct();
    }

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
     * Set isconnect
     *
     * @param string $isconnect
     * @return User
     */
    public function setIsconnect($isconnect)
    {
        $this->isconnect = $isconnect;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getIsconnect()
    {
        return $this->isconnect;
    }

    /**
     * Set adressecontact
     *
     * @param \BZ\ModelBundle\Entity\AdresseContact $adressecontact
     * @return User
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
     * Set profil
     *
     * @param \BZ\ModelBundle\Entity\Profil $profil
     * @return User
     */
    public function setProfil(\BZ\ModelBundle\Entity\Profil $profil = null)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \BZ\ModelBundle\Entity\Profil 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set fileidentite
     *
     * @param \BZ\ModelBundle\Entity\FileIdentite $fileidentite
     * @return User
     */
    public function setFileidentite(\BZ\ModelBundle\Entity\FileIdentite $fileidentite = null)
    {
        $this->fileidentite = $fileidentite;

        return $this;
    }

    /**
     * Get fileidentite
     *
     * @return \BZ\ModelBundle\Entity\FileIdentite 
     */
    public function getFileidentite()
    {
        return $this->fileidentite;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set directeurtechnique
     *
     * @param \BZ\ModelBundle\Entity\DirecteurTechnique $directeurtechnique
     * @return User
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
     * Set agent
     *
     * @param \BZ\ModelBundle\Entity\Agent $agent
     * @return User
     */
    public function setAgent(\BZ\ModelBundle\Entity\Agent $agent = null)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \BZ\ModelBundle\Entity\Agent 
     */
    public function getAgent()
    {
        return $this->agent;
    }
    
    public function getNomPrenom()
    {
        $nomprenom='';
        if($this->getAgent() !=null)
        {
            $nomprenom=$this->getAgent()->getNomprenom(); 
        }
        if($this->getDirecteurtechnique() !=null)
        {
            $nomprenom=$this->getDirecteurtechnique()->getNomprenom(); 
        }
        return $nomprenom;
    }
    
}
