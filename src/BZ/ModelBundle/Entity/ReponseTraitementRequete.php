<?php

namespace BZ\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseTraitementRequete
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BZ\ModelBundle\Repository\ReponseTraitementRequeteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ReponseTraitementRequete
{
    /**
    * @ORM\ManyToOne(targetEntity="BZ\ModelBundle\Entity\Mention", inversedBy="reponseusagerclients")
    * @ORM\JoinColumn(nullable=true) 
    */
    private $mention;
   /**
    * @ORM\OneToOne(targetEntity="BZ\ModelBundle\Entity\TraitementRequete", cascade={"persist"}, inversedBy="reponsetraitementrequete")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $traitementrequete;
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
     * @ORM\Column(name="dateReponse", type="datetime")
     */
    private $dateReponse;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireReponse", type="text")
     */
    private $commentaireReponse;

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
     * Set dateReponse
     *
     * @param \DateTime $dateReponse
     * @return ReponseTraitementRequete
     */
    public function setDateReponse($dateReponse)
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }

    /**
     * Get dateReponse
     *
     * @return \DateTime 
     */
    public function getDateReponse()
    {
        return $this->dateReponse;
    }

    /**
     * Set commentaireReponse
     *
     * @param string $commentaireReponse
     * @return ReponseTraitementRequete
     */
    public function setCommentaireReponse($commentaireReponse)
    {
        $this->commentaireReponse = $commentaireReponse;

        return $this;
    }

    /**
     * Get commentaireReponse
     *
     * @return string 
     */
    public function getCommentaireReponse()
    {
        return $this->commentaireReponse;
    }

    /**
     * Set traitementrequete
     *
     * @param \BZ\ModelBundle\Entity\TraitementRequete $traitementrequete
     * @return ReponseTraitementRequete
     */
    public function setTraitementrequete(\BZ\ModelBundle\Entity\TraitementRequete $traitementrequete)
    {
        $this->traitementrequete = $traitementrequete;

        return $this;
    }

    /**
     * Get traitementrequete
     *
     * @return \BZ\ModelBundle\Entity\TraitementRequete 
     */
    public function getTraitementrequete()
    {
        return $this->traitementrequete;
    }

    /**
     * Set mention
     *
     * @param \BZ\ModelBundle\Entity\Mention $mention
     * @return ReponseTraitementRequete
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
