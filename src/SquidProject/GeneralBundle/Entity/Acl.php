<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acl
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Acl
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
     * @var integer
     *
     * @ORM\Column(name="id_source", type="integer")
     */
    private $idSource;

   
    /**
     * @var integer
     *
     * @ORM\Column(name="id_time", type="integer")
     */
    private $idTime;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect_link", type="string", length=255)
     */
    private $redirectLink;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;


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
     * Set idSource
     *
     * @param integer $idSource
     * @return Acl
     */
    public function setIdSource($idSource)
    {
        $this->idSource = $idSource;
    
        return $this;
    }

    /**
     * Get idSource
     *
     * @return integer 
     */
    public function getIdSource()
    {
        return $this->idSource;
    }

   

    /**
     * Set idTime
     *
     * @param integer $idTime
     * @return Acl
     */
    public function setIdTime($idTime)
    {
        $this->idTime = $idTime;
    
        return $this;
    }

    /**
     * Get idTime
     *
     * @return integer 
     */
    public function getIdTime()
    {
        return $this->idTime;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Acl
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set redirectLink
     *
     * @param string $redirectLink
     * @return Acl
     */
    public function setRedirectLink($redirectLink)
    {
        $this->redirectLink = $redirectLink;
    
        return $this;
    }

    /**
     * Get redirectLink
     *
     * @return string 
     */
    public function getRedirectLink()
    {
        return $this->redirectLink;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Acl
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
