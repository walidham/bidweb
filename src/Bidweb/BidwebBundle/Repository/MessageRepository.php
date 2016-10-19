<?php

namespace Bidweb\BidwebBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends EntityRepository
{
    
    public function getMessageAccount($id){
        $qb = $this->createQueryBuilder('b')
                   ->select('count(b.id)')
                   ->where('b.receiver = :id')
                   ->andWhere("b.read = false")
                   ->setParameter('id', $id);

     
        return $qb->getQuery()
                  ->getSingleScalarResult();
    }
    
    public function getLastMessages($id,$limit=null){
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->where('b.receiver = :id')
                    ->orderBy('b.created', 'DESC')
                   ->setParameter('id', $id);

     if (false === is_null($limit))
            $qb->setMaxResults($limit);
     
        return $qb->getQuery()
                  ->getResult();
    }
    
    public function getLastMessagesSent($id,$limit=null){
        $qb = $this->createQueryBuilder('b')
                   ->select('b')
                   ->where('b.sender = :id')
                    ->orderBy('b.created', 'DESC')
                   ->setParameter('id', $id);

     if (false === is_null($limit))
            $qb->setMaxResults($limit);
     
        return $qb->getQuery()
                  ->getResult();
    }
}
