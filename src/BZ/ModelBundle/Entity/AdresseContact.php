<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdresseContact
 *
 * @ORM\Table(name="adressecontact")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\AdresseContactRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class AdresseContact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Quartier")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $quartier;

    /**
     * @var string
     *
     * @ORM\Column(name="telmobile", type="string", length=255)
     */
    private $telmobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    private $details;

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
     * Set localite
     *
     * @param string $localite
     * @return AdresseContact
     */
    public function setLocalite($localite)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return string 
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set telmobile
     *
     * @param string $telmobile
     * @return AdresseContact
     */
    public function setTelmobile($telmobile)
    {
        $this->telmobile = $telmobile;

        return $this;
    }

    /**
     * Get telmobile
     *
     * @return string 
     */
    public function getTelmobile()
    {
        return $this->telmobile;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return AdresseContact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set details
     *
     * @param string $details
     * @return AdresseContact
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set quartier
     *
     * @param \BZ\ModelBundle\Entity\Quartier $quartier
     * @return AdresseContact
     */
    public function setQuartier(\BZ\ModelBundle\Entity\Quartier $quartier = null)
    {
        $this->quartier = $quartier;

        return $this;
    }

    /**
     * Get quartier
     *
     * @return \BZ\ModelBundle\Entity\Quartier 
     */
    public function getQuartier()
    {
        return $this->quartier;
    }
}
