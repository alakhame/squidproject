<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WeekSquid
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WeekSquid
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
     * @ORM\Column(name="id_time", type="integer")
     */
    private $idTime;

    /**
     * @var string
     *
     * @ORM\Column(name="weekly", type="string", length=255)
     */
    private $weekly;


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
     * Set idTime
     *
     * @param integer $idTime
     * @return WeekSquid
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
     * Set weekly
     *
     * @param string $weekly
     * @return WeekSquid
     */
    public function setWeekly($weekly)
    {
        $this->weekly = $weekly;
    
        return $this;
    }

    /**
     * Get weekly
     *
     * @return string 
     */
    public function getWeekly()
    {
        return $this->weekly;
    }
}
