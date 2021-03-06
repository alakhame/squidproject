<?php

namespace SquidProject\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Destination
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Destination
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_destination_db", type="integer")
     */
    private $idDestinationDb;


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
     * Set nom
     *
     * @param string $nom
     * @return Destination
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
     * Set idDestinationDb
     *
     * @param integer $idDestinationDb
     * @return Destination
     */
    public function setIdDestinationDb($idDestinationDb)
    {
        $this->idDestinationDb = $idDestinationDb;
    
        return $this;
    }

    /**
     * Get idDestinationDb
     *
     * @return integer 
     */
    public function getIdDestinationDb()
    {
        return $this->idDestinationDb;
    }
}
