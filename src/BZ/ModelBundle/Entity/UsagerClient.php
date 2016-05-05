<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsagerClient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\UsagerClientRepository")
 *  @ORM\HasLifecycleCallbacks()
 */
class UsagerClient 
{
     /**
     * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\AdresseContact", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true) 
     */
    private $adressecontact;
     
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
     * @ORM\Column(name="datePriseContact", type="datetime")
     */
    private $datePriseContact;

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
     * Set datePriseContact
     *
     * @param \DateTime $datePriseContact
     * @return UsagerClient
     */
    public function setDatePriseContact($datePriseContact)
    {
        $this->datePriseContact = $datePriseContact;

        return $this;
    }

    /**
     * Get datePriseContact
     *
     * @return \DateTime 
     */
    public function getDatePriseContact()
    {
        return $this->datePriseContact;
    }

    /**
     * Set adressecontact
     *
     * @param \BZ\ModelBundle\Entity\AdresseContact $adressecontact
     * @return UsagerClient
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
    * @ORM\PrePersist
    */
   public function avantEnregistrement()
   {
     $this->setDatePriseContact(new \Datetime());
   }
   
}
