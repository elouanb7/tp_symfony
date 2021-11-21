<?php

namespace App\Repository;

use App\Entity\UserSoiree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserSoiree|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSoiree|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSoiree[]    findAll()
 * @method UserSoiree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSoireeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSoiree::class);
    }

    // /**
    //  * @return UserSoiree[] Returns an array of UserSoiree objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserSoiree
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
