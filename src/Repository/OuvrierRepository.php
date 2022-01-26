<?php

namespace App\Repository;

use App\Entity\Ouvrier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ouvrier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ouvrier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ouvrier[]    findAll()
 * @method Ouvrier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvrierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ouvrier::class);
    }

    // /**
    //  * @return Ouvrier[] Returns an array of Ouvrier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ouvrier
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
