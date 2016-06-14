<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClotureRequete
 *
 * @ORM\Table(name="cloturerequete")
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ClotureRequeteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ClotureRequete
{
    /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\Requete", inversedBy="cloturerequete")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $requete;
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Mention", inversedBy="cloturerequetes")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $mention;
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
     * @ORM\Column(name="dateCloture", type="datetime")
     */
    private $dateCloture;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireCloture", type="text")
     */
    private $commentaireCloture;


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
     * Set dateCloture
     *
     * @param \DateTime $dateCloture
     * @return ClotureRequete
     */
    public function setDateCloture($dateCloture)
    {
        $this->dateCloture = $dateCloture;

        return $this;
    }

    /**
     * Get dateCloture
     *
     * @return \DateTime 
     */
    public function getDateCloture()
    {
        return $this->dateCloture;
    }

    /**
     * Set commentaireCloture
     *
     * @param string $commentaireCloture
     * @return ClotureRequete
     */
    public function setCommentaireCloture($commentaireCloture)
    {
        $this->commentaireCloture = $commentaireCloture;

        return $this;
    }

    /**
     * Get commentaireCloture
     *
     * @return string 
     */
    public function getCommentaireCloture()
    {
        return $this->commentaireCloture;
    }

    /**
     * Set requete
     *
     * @param \BZ\ModelBundle\Entity\Requete $requete
     * @return ClotureRequete
     */
    public function setRequete(\BZ\ModelBundle\Entity\Requete $requete)
    {
        $this->requete = $requete;

        return $this;
    }

    /**
     * Get requete
     *
     * @return \BZ\ModelBundle\Entity\Requete 
     */
    public function getRequete()
    {
        return $this->requete;
    }

    /**
     * Set mention
     *
     * @param \BZ\ModelBundle\Entity\Mention $mention
     * @return ClotureRequete
     */
    public function setMention(\BZ\ModelBundle\Entity\Mention $mention = null)
    {
        $this->mention = $mention;

        return $this;
    }

    /**
     * Get mention
     *
     * @return \BZ\ModelBundle\Entity\Mention 
     */
    public function getMention()
    {
        return $this->mention;
    }
    
    
}
