<?php

namespace App\Repository;

use App\Entity\Yuser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Yuser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Yuser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Yuser[]    findAll()
 * @method Yuser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YuserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Yuser::class);
    }

    // /**
    //  * @return Yuser[] Returns an array of Yuser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Yuser
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
