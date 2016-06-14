<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeSaisine
 *
 * @ORM\Table(name="modesaisine")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ModeSaisineRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ModeSaisine
{
    /**
     * @ORM\OneToMany(targetEntity="BZ\ModelBundle\Entity\Requete", mappedBy="modesaisine")
     * @ORM\JoinColumn(nullable=true) 
     */
    private $rerequetes;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     * @return ModeSaisine
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rerequetes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rerequetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $rerequetes
     * @return ModeSaisine
     */
    public function addRerequete(\BZ\ModelBundle\Entity\Requete $rerequetes)
    {
        $this->rerequetes[] = $rerequetes;

        return $this;
    }

    /**
     * Remove rerequetes
     *
     * @param \BZ\ModelBundle\Entity\Requete $rerequetes
     */
    public function removeRerequete(\BZ\ModelBundle\Entity\Requete $rerequetes)
    {
        $this->rerequetes->removeElement($rerequetes);
    }

    /**
     * Get rerequetes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRerequetes()
    {
        return $this->rerequetes;
    }
}
