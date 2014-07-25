<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DomaineSource
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DomaineSource
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
     * @ORM\Column(name="id_domaine", type="integer")
     */
    private $idDomaine;


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
     * @return DomaineSource
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
     * Set idDomaine
     *
     * @param integer $idDomaine
     * @return DomaineSource
     */
    public function setIdDomaine($idDomaine)
    {
        $this->idDomaine = $idDomaine;
    
        return $this;
    }

    /**
     * Get idDomaine
     *
     * @return integer 
     */
    public function getIdDomaine()
    {
        return $this->idDomaine;
    }
}
