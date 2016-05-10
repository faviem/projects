<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdresseContact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\AdresseContactRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class AdresseContact
{
    
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Ville")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $ville;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Departement")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $departement;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Arrondissement")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $arrondissement;
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
     * Set ville
     *
     * @param \BZ\ModelBundle\Entity\Ville $ville
     * @return AdresseContact
     */
    public function setVille(\BZ\ModelBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \BZ\ModelBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set departement
     *
     * @param \BZ\ModelBundle\Entity\Departement $departement
     * @return AdresseContact
     */
    public function setDepartement(\BZ\ModelBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \BZ\ModelBundle\Entity\Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set arrondissement
     *
     * @param \BZ\ModelBundle\Entity\Arrondissement $arrondissement
     * @return AdresseContact
     */
    public function setArrondissement(\BZ\ModelBundle\Entity\Arrondissement $arrondissement = null)
    {
        $this->arrondissement = $arrondissement;

        return $this;
    }

    /**
     * Get arrondissement
     *
     * @return \BZ\ModelBundle\Entity\Arrondissement 
     */
    public function getArrondissement()
    {
        return $this->arrondissement;
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
