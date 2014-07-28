<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DateSquid
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DateSquid
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
     * @ORM\Column(name="date", type="string", length=255)
     */
    private $date;


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
     * @return DateSquid
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
     * Set date
     *
     * @param string $date
     * @return DateSquid
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }
}
