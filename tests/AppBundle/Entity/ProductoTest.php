<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Producto;
use PHPUnit\Framework\TestCase;

class ProductoTest extends TestCase
{
    public function testAgregar()
    {
        $producto = new Producto();
        $producto->setUnidadesActuales(1);
        $producto->agregar(19);
        $this->assertEquals(20, $producto->getUnidadesActuales());
    }

    public function testRestar()
    {
        $producto = new Producto();
        $producto->setUnidadesActuales(10);
        $producto->restar(5);
        $this->assertEquals(5, $producto->getUnidadesActuales());
    }

    public function testActivar()
    {
        $producto = new Producto();
        $producto->setEstado(Producto::ESTADO_PRODUCTO_ACTIVO);
        $this->assertEquals(Producto::ESTADO_PRODUCTO_ACTIVO, $producto->getEstado());
    }
    
    public function testDesactivar()
    {
        $producto = new Producto();
        $producto->setEstado(Producto::ESTADO_PRODUCTO_INACTIVO);
        $this->assertEquals(Producto::ESTADO_PRODUCTO_INACTIVO, $producto->getEstado());
    }



}