<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IpSource
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class IpSource
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
     * @var string
     *
     * @ORM\Column(name="id_source", type="string", length=255)
     */
    private $idSource;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ip", type="integer")
     */
    private $idIp;


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
     * @param string $idSource
     * @return IpSource
     */
    public function setIdSource($idSource)
    {
        $this->idSource = $idSource;
    
        return $this;
    }

    /**
     * Get idSource
     *
     * @return string 
     */
    public function getIdSource()
    {
        return $this->idSource;
    }

    /**
     * Set idIp
     *
     * @param integer $idIp
     * @return IpSource
     */
    public function setIdIp($idIp)
    {
        $this->idIp = $idIp;
    
        return $this;
    }

    /**
     * Get idIp
     *
     * @return integer 
     */
    public function getIdIp()
    {
        return $this->idIp;
    }
}
