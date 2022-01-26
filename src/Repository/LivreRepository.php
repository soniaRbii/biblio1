<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Data\SearchData;
/**
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }
      /**
     * Récupère les produits en lien avec une recherche
     * @return Livre[]
     */
    public function findSearch(SearchData $search)
    {
         $helpers = array('Paginator'); 
        $query = $this
            ->createQueryBuilder('l');
            

        if (!empty($search->q) and !(empty($search->u))) {
            $query = $query
                ->andWhere('l.titre LIKE :q')-> OrWhere('l.categorie LIKE :u')
                ->setParameter(['q', "%{$search->q}%"]);
        }

      
        return $query->getQuery()->getResult();
    }

    private function getSearchQuery(SearchData $search, $ignorePrice = false): QueryBuilder
    {
    }

    // /**
    //  * @return Livre[] Returns an array of Livre objects
    //  */
  
    public function findByPrixSuperieur($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.prix > :val')
            ->setParameter('val', $value)
            
            ->orderBy('l.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
   
    /*
    public function findOneBySomeField($value): ?Livre
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
