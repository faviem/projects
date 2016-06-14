<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emetteur
 *
 * @ORM\Table(name="emetteur")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\EmetteurRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Emetteur
{
     /**
    * @ORM\ManyToOne(targetEntity="BZ\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $user;
     /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Message", inversedBy="emetteur")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $message;
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
     * @return Emetteur
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
     * @return Emetteur
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
    * @ORM\PrePersist
    */
   public function avantEnregistrement()
   {
     $this->setEstdelete(false);
     $this->setDatedelete(null);
     $this->setDatepersist(new \ Datetime());
   }
   

    /**
     * Set datepersist
     *
     * @param \DateTime $datepersist
     * @return Emetteur
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
}
