<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 *
 * @method Review|null find($id, $lockMode = null, $lockVersion = null)
 * @method Review|null findOneBy(array $criteria, array $orderBy = null)
 * @method Review[]    findAll()
 * @method Review[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    public function add(Review $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Review $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findCountFlamme($id)
    {
        $sql = "SELECT COUNT(*) FROM review
        WHERE review.vote = 1  and deal_id = " . $id;

        $dbal = $this->getEntityManager()->getConnection();
        $statement = $dbal->prepare($sql);
        $result = $statement->executeQuery();

        
        return $result->fetchAssociative();
    }

    public function findCountIce($id)
    {
        $sql = "SELECT count(*) FROM review
        WHERE review.vote = -1  and deal_id = " . $id;

        $dbal = $this->getEntityManager()->getConnection();
        $statement = $dbal->prepare($sql);
        $result = $statement->executeQuery();

        
        return $result->fetchAssociative();
    }

    public function findDealOrderByCreatedAt()
    {
        // classer par status et date de création
        $results = $this->createQueryBuilder('r') 
            ->orderBy('r.deal_id', 'DESC') 
            ->getQuery()
            ->getResult();

        return $results;
    } 
            

//    /**
//     * @return Review[] Returns an array of Review objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Review
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
