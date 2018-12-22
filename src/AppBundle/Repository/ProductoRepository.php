<?php


namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductoRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Producto p ORDER BY p.nombre ASC'
            )
            ->getResult();
    }
}