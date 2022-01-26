<?php

namespace App\Repository;

use App\Entity\Empreint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Empreint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Empreint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Empreint[]    findAll()
 * @method Empreint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpreintRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empreint::class);
    }

    // /**
    //  * @return Empreint[] Returns an array of Empreint objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Empreint
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
