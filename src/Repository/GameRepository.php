<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Game>
 *
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function add(Game $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Game $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    
    public function findGameByNameWithDeals($title)
    {       
        $sql = "select game.id as game_id,  game.name, game.image, game.description, game.price, game.category_id, deal.id as deal_id from game
        left join deal on game.id= deal.game_id
         where name like '%$title%'";

        $dbal = $this->getEntityManager()->getConnection();
        $statement = $dbal->prepare($sql);
        $result = $statement->executeQuery();
        
        return $result->fetchAllAssociative();
    }

    public function findGameByName($title)
    {       
        $sql = "select * from game
         where name like '%$title%'";

        $dbal = $this->getEntityManager()->getConnection();
        $statement = $dbal->prepare($sql);
        $result = $statement->executeQuery();
        
        return $result->fetchAllAssociative();
    }

    public function findGameOrderByName()
    {
        // classer par status et date de création
        $results = $this->createQueryBuilder('g') 
            ->orderBy('g.name', 'ASC')
            ->getQuery()
            ->getResult();

        return $results;
    }
//    /**
//     * @return Game[] Returns an array of Game objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Game
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
