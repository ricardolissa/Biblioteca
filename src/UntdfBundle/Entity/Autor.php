<?php

namespace UntdfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="autor")
 */
class Autor
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
 * @ORM\Column(type="string", length=100)
 */
    private $apellido;


/**
 * @ORM\Column(type="string", length=100)
 */
    private $apodo;

 /**
 * @ORM\Column(type="string", length=100)
 */
    private $foto;
 
/**
 * @ORM\Column(type="string", length=500)
 */
    private $biografia;

   

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

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApodo()
    {
        return $this->apodo;
    }

    /**
     * @param mixed $apodo
     *
     * @return self
     */
    public function setApodo($apodo)
    {
        $this->apodo = $apodo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     *
     * @return self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * @param mixed $biografia
     *
     * @return self
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }
    public function __toString(){

        return $this->nombre;

    }
}