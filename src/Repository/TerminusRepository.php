<?php

namespace App\Repository;

use App\Entity\Terminus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Terminus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Terminus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Terminus[]    findAll()
 * @method Terminus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TerminusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Terminus::class);
    }

    // /**
    //  * @return Terminus[] Returns an array of Terminus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Terminus
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
