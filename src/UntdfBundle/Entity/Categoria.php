<?php

namespace UntdfBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use UntdfBundle\Entity\Categoria;

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 */
class Categoria

{

/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")

 */
    private $id;
  
/**
 * @ORM\Column(type="string", length=100)
 */
    private $nombre;
    

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function __toString(){

        return $this->nombre;

    }
}