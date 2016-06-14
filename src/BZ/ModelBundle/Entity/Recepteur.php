<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recepteur
 *
 * @ORM\Table(name="recepteur")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\RecepteurRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Recepteur
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $user;
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Message", inversedBy="recepteurs")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $message;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepersist", type="datetime", nullable=true)
     */
    private $datepersist;
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateLu", type="datetime", nullable=true)
     */
    private $dateLu;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="estLu", type="boolean", nullable=true)
     */
    private $estLu;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * Set user
     *
     * @param \BZ\UserBundle\Entity\User $user
     * @return Recepteur
     */
    public function setUser(\BZ\UserBundle\Entity\User $user = null)
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
     * Set message
     *
     * @param \BZ\ModelBundle\Entity\Message $message
     * @return Recepteur
     */
    public function setMessage(\BZ\ModelBundle\Entity\Message $message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \BZ\ModelBundle\Entity\Message 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set datedelete
     *
     * @param \DateTime $datedelete
     * @return Recepteur
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
     * @return Recepteur
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
     * Set dateLu
     *
     * @param \DateTime $dateLu
     * @return Recepteur
     */
    public function setDateLu($dateLu)
    {
        $this->dateLu = $dateLu;

        return $this;
    }

    /**
     * Get dateLu
     *
     * @return \DateTime 
     */
    public function getDateLu()
    {
        return $this->dateLu;
    }

    /**
     * Set estLu
     *
     * @param boolean $estLu
     * @return Recepteur
     */
    public function setEstLu($estLu)
    {
        $this->estLu = $estLu;

        return $this;
    }

    /**
     * Get estLu
     *
     * @return boolean 
     */
    public function getEstLu()
    {
        return $this->estLu;
    }
    
      /**
    * @ORM\PrePersist
    */
   public function avantEnregistrement()
   {
     $this->setEstdelete(false);
     $this->setEstLu(false);
     $this->setDatedelete(null);
     $this->setDateLu(null);
     $this->setDatepersist(new \ Datetime());
   }
   

    /**
     * Set datepersist
     *
     * @param \DateTime $datepersist
     * @return Recepteur
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
    
    public function getNomPrenom()
    {
        return $this->getUser()->getNomPrenom();
    }
}
