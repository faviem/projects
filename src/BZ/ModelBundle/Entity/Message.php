<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\FileRequete", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $filerequete;
  /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Emetteur", mappedBy="message", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $emetteur;    
    
  /**
    * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\Recepteur", mappedBy="message", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true) 
    */
    private $recepteurs;    
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
     * @ORM\Column(name="dateEnvoi", type="datetime")
     */
    private $dateEnvoi;

     /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=100,nullable=true)
     */
    private $objet;
    /**
     * @var string
     * 
     * @ORM\Column(name="messageEnvoi", type="text", nullable=true)
     */
    private $messageEnvoi;

    
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
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     * @return Message
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime 
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }
    /**
     * Set messageEnvoi
     *
     * @param string $messageEnvoi
     * @return Message
     */
    public function setMessageEnvoi($messageEnvoi)
    {
        $this->messageEnvoi = $messageEnvoi;

        return $this;
    }

    /**
     * Get messageEnvoi
     *
     * @return string 
     */
    public function getMessageEnvoi()
    {
        return $this->messageEnvoi;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recepteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set emetteur
     *
     * @param \BZ\ModelBundle\Entity\Emetteur $emetteur
     * @return Message
     */
    public function setEmetteur(\BZ\ModelBundle\Entity\Emetteur $emetteur = null)
    {
        $this->emetteur = $emetteur;
        $emetteur->setMessage($this);
        return $this;
    }

    /**
     * Get emetteur
     *
     * @return \BZ\ModelBundle\Entity\Emetteur 
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * Add recepteurs
     *
     * @param \BZ\ModelBundle\Entity\Recepteur $recepteurs
     * @return Message
     */
    public function addRecepteur(\BZ\ModelBundle\Entity\Recepteur $recepteurs)
    {
        $this->recepteurs[] = $recepteurs;
        $recepteurs->setMessage($this);
        return $this;
    }

    /**
     * Remove recepteurs
     *
     * @param \BZ\ModelBundle\Entity\Recepteur $recepteurs
     */
    public function removeRecepteur(\BZ\ModelBundle\Entity\Recepteur $recepteurs)
    {
        $this->recepteurs->removeElement($recepteurs);
    }

    /**
     * Get recepteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecepteurs()
    {
        return $this->recepteurs;
    }

    /**
     * Set filerequete
     *
     * @param \BZ\ModelBundle\Entity\FileRequete $filerequete
     * @return Message
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
     * Set objet
     *
     * @param string $objet
     * @return Message
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }
}
