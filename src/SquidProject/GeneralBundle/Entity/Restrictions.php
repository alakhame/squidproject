<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restrictions
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Restrictions
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
     * @ORM\Column(name="id_dest", type="integer")
     */
    private $idDest;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_acl", type="integer")
     */
    private $idAcl;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;


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
     * Set idDest
     *
     * @param integer $idDest
     * @return Restrictions
     */
    public function setIdDest($idDest)
    {
        $this->idDest = $idDest;
    
        return $this;
    }

    /**
     * Get idDest
     *
     * @return integer 
     */
    public function getIdDest()
    {
        return $this->idDest;
    }

    /**
     * Set idAcl
     *
     * @param integer $idAcl
     * @return Restrictions
     */
    public function setIdAcl($idAcl)
    {
        $this->idAcl = $idAcl;
    
        return $this;
    }

    /**
     * Get idAcl
     *
     * @return integer 
     */
    public function getIdAcl()
    {
        return $this->idAcl;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Restrictions
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }
}
