<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customer>
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
     * Retourne un QueryBuilder pour la liste filtrée de clients
     *
     * @param string|null $search Texte à rechercher (nom, prénom, email)
     */
    public function findFiltered(?string $search): QueryBuilder
    {
        $qb = $this->createQueryBuilder('c')
            ->orderBy('c.lastname', 'DESC'); // ordre par défaut

        if ($search) {
            $qb->andWhere('LOWER(c.firstname) LIKE :search OR LOWER(c.lastname) LIKE :search OR LOWER(c.email) LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        return $qb;
    }

    public function findAllAsArray(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, c.firstname, c.lastname, c.email, c.createdAt')
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }

    //    /**
    //     * @return Customer[] Returns an array of Customer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Customer
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
