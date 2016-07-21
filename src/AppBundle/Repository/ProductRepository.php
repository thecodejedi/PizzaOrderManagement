<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ProductRepository
 *
 * @author thecodejedi
 */
class ProductRepository extends EntityRepository {

    public function findActive() {

        $qb = $this->getEntityManager()
                        ->getRepository('AppBundle:Product')
                        ->createQueryBuilder('p')->where('p.active = true');

        return $qb->getQuery()->getResult();
    }

}
