<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
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
     * @ORM\Column(type="integer")
     */
    private $estado;



}