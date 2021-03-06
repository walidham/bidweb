<?php

namespace Bidweb\BidwebBundle\Repository;

/**
 * WebsiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WebsiteRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLatestWebsite($limit = null)
    {
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->addOrderBy('b.created', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                  ->getResult();
    }
    
    public function searchWebsite($text,$limit=null)
    {
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->where('b.title LIKE :text')
                   ->orWhere('b.detail LIKE :text')
                   ->addOrderBy('b.created', 'DESC')
                ->setParameter('text', "%$text%");

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                  ->getResult();
    }
}
