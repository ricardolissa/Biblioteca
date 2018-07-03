<?php

namespace UntdfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use UntdfBundle\Entity\Categoria;

use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\Table(name="libro")
 */

class Libro
{

/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 * @JMS\Groups({"api"})
 */
private $id;

/**
 * @ORM\Column(type="string", length=100)
 * @JMS\Groups({"api"})
 */
private $nombre;

/**
 * @ORM\Column(type="string", length=100)
 * @JMS\Groups({"api"})
 */
private $isbn;


/**
 * @ORM\Column(type="integer", length=100)
 @JMS\Groups({"api"})
 */
private $edicion;

/**
 * @ORM\Column(type="text")
 @JMS\Groups({"api"})
 */
private $editorial;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $resumen;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $foto;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $vistaprevia;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $linkarchivo;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $web;

/**
 * @ORM\Column(type="text")
 * @JMS\Groups({"api"})
 */
private $indice;

/**
 * @ORM\Column(type="date")
 * @JMS\Groups({"api"})
 */
private $fechadecarga;

    /**
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @JMS\Groups({"api"})
     */
    protected $idioma;

    /**
     * @ORM\ManyToMany(targetEntity="Categoria")
     * @JMS\Groups({"api"})
     */
    
    private $categorias;

    /**
     * @ORM\ManyToMany(targetEntity="Autor")
     * @JMS\Groups({"api"})
     */
    protected $autores;
    
    public function construct()
    {
        $this->autores = new ArrayCollection();
        $this->categorias = new ArrayCollection();
    }
    /**
     * @return mixed
     */
   

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
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     *
     * @return self
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdicion()
    {
        return $this->edicion;
    }

    /**
     * @param mixed $edicion
     *
     * @return self
     */
    public function setEdicion($edicion)
    {
        $this->edicion = $edicion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     *
     * @return self
     */
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * @param mixed $resumen
     *
     * @return self
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

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
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @param mixed $web
     *
     * @return self
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndice()
    {
        return $this->indice;
    }

    /**
     * @param mixed $indice
     *
     * @return self
     */
    public function setIndice($indice)
    {
        $this->indice = $indice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechadecarga()
    {
        return $this->fechadecarga;
    }

    /**
     * @param mixed $fechadecarga
     *
     * @return self
     */
    public function setFechadecarga($fechadecarga)
    {
        $this->fechadecarga = $fechadecarga;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * @param mixed $idioma
     *
     * @return self
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }




    /**
     * @return mixed
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @return mixed
     */
    public function setCategorias($categorias)
    {
         $this->categorias = $categorias;
         return $this;
    }

    /**
     * @param mixed $categoria
     *
     * @return self
     */
    public function addCategoria(Categoria $categoria)
    {
        $this->categorias[] = $categoria;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutores()
    {
        return $this->autores;
    }

    /**
     * @param mixed $autor
     *
     * @return self
     */
    public function addAutor($autor)
    {
        $this->autores [] = $autor;

        return $this;
    }

    public function setAutores($autores)
    {
        $this->autores = $autores;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getLinkarchivo()
    {
        return $this->linkarchivo;
    }

    /**
     * @param mixed $linkarchivo
     *
     * @return self
     */
    public function setLinkarchivo($linkarchivo)
    {
        $this->linkarchivo = $linkarchivo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVistaprevia()
    {
        return $this->vistaprevia;
    }

    /**
     * @param mixed $vistaprevia
     *
     * @return self
     */
    public function setVistaprevia($vistaprevia)
    {
        $this->vistaprevia = $vistaprevia;

        return $this;
    }
}