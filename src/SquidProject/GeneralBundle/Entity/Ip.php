<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ip
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ip
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_list_file", type="string", length=255)
     */
    private $ipListFile;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_cidr", type="string", length=255)
     */
    private $ipCidr;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_range", type="string", length=255)
     */
    private $ipRange;


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
     * Set type
     *
     * @param string $type
     * @return Ip
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set ipListFile
     *
     * @param string $ipListFile
     * @return Ip
     */
    public function setIpListFile($ipListFile)
    {
        $this->ipListFile = $ipListFile;
    
        return $this;
    }

    /**
     * Get ipListFile
     *
     * @return string 
     */
    public function getIpListFile()
    {
        return $this->ipListFile;
    }

    /**
     * Set ipCidr
     *
     * @param string $ipCidr
     * @return Ip
     */
    public function setIpCidr($ipCidr)
    {
        $this->ipCidr = $ipCidr;
    
        return $this;
    }

    /**
     * Get ipCidr
     *
     * @return string 
     */
    public function getIpCidr()
    {
        return $this->ipCidr;
    }

    /**
     * Set ipRange
     *
     * @param string $ipRange
     * @return Ip
     */
    public function setIpRange($ipRange)
    {
        $this->ipRange = $ipRange;
    
        return $this;
    }

    /**
     * Get ipRange
     *
     * @return string 
     */
    public function getIpRange()
    {
        return $this->ipRange;
    }
}
