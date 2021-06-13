<?php

namespace App\Repository;

use App\Entity\LigneBus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneBus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneBus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneBus[]    findAll()
 * @method LigneBus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneBusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneBus::class);
    }

    // /**
    //  * @return LigneBus[] Returns an array of LigneBus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneBus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
