<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of TotalOrderRepository
 *
 * @author thecodejedi
 */
class TotalOrderRepository extends EntityRepository {

    public function findOrders() {

        $qb = $this->getEntityManager()
                        ->getRepository('AppBundle:TotalOrder')
                        ->createQueryBuilder('e')->select('e');

        return $qb
                        ->orderBy('e.date')
                        ->getQuery()->getResult();
    }
    
    public function findTodaysOrder() {

        $now = new \DateTime();
        
        $result = $this->findByDate($now);
        
        if(isset($result[0]))
            return $result[0];
        
        return null;
        
    }
    
    
    public function findByDate(\DateTime $date) {
        return $this->getEntityManager()
                        ->createQuery(
                                'SELECT to FROM AppBundle:TotalOrder to WHERE DATE(to.date) = DATE(:date)'
                        )->setParameter('date', $date)
                        ->getResult();
    }
    
    public function findLatest() {

        $qb = $this->getEntityManager()
                        ->getRepository('AppBundle:TotalOrder')
                        ->createQueryBuilder('e')->select('e');
        $result = $qb
                ->orderBy('e.date')
                ->setMaxResults(1)
                ->getQuery()->getResult();
        if(isset($result[0]))
            return $result[0];
        
        return null;
        
    }

}
