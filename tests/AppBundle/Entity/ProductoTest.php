<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Producto;
use PHPUnit\Framework\TestCase;

class ProductoTest extends TestCase
{
    public function testAgregar()
    {
        $calculator = new Calculator();
        $result = $calculator->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}