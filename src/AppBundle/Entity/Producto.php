<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductoRepository")
 */
class Producto
{

	const ESTADO_PRODUCTO_ACTIVO = "ACTIVO";
	const ESTADO_PRODUCTO_INACTIVO = "INACTIVO";

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $referencia;

    /**
     * @ORM\Column(type="integer")
     */
    private $precio;

    /**
     * @ORM\Column(type="integer")
     */
    private $costo;

    /**
     * @ORM\Column(type="integer")
     */
    private $unidadesActuales;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $estado;



	public function __construct() {
	}

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     *
     * @return Producto
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;

        return $this;
    }

    /**
     * Get referencia
     *
     * @return string
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set precio
     *
     * @param integer $precio
     *
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return integer
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set costo
     *
     * @param integer $costo
     *
     * @return Producto
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return integer
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set unidadesActuales
     *
     * @param integer $unidadesActuales
     *
     * @return Producto
     */
    public function setUnidadesActuales($unidadesActuales)
    {
        $this->unidadesActuales = $unidadesActuales;

        return $this;
    }

    /**
     * Get unidadesActuales
     *
     * @return integer
     */
    public function getUnidadesActuales()
    {
        return $this->unidadesActuales;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     *
     * @return Producto
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }



	/**
	 *
	 * @param integer $cantidad
	 */
	public function agregar($cantidad){
		$this->setUnidadesActuales($this->getUnidadesActuales()+$cantidad);
	}

	/**
	 *
	 * @param integer $cantidad
	 */
	public function restar($cantidad){
		$this->setUnidadesActuales($this->getUnidadesActuales()-$cantidad);
	}

	public function activar(){
		$this->setEstado($this::ESTADO_PRODUCTO_ACTIVO);
	}

	public function desactivar(){
		$this->setEstado($this::ESTADO_PRODUCTO_INACTIVO);
	}
}
