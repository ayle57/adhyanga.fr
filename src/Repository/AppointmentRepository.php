<?php

namespace App\Repository;

use App\Entity\Appointment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 */
class AppointmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    /**
     * Retourne un QueryBuilder pour la liste filtrée de clients
     *
     * @param string|null $search Texte à rechercher (nom, prénom, email)
     */
    public function findFiltered(?string $search, string $sortField = 'a.createdAt', string $sortDirection = 'DESC'): QueryBuilder
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.customer', 'c')
            ->addSelect('c');

        if ($search) {
            $qb->andWhere(
                'LOWER(c.firstname) LIKE :search OR LOWER(c.lastname) LIKE :search OR LOWER(c.email) LIKE :search'
            )
                ->setParameter('search', '%' . strtolower($search) . '%');
        }

        $qb->addSelect("
        CASE
            WHEN a.status = 'Programmé' OR a.status = 'scheduled' THEN 0
            WHEN a.status = 'Terminé' OR a.status = 'done' THEN 1
            WHEN a.status = 'Annulé' OR a.status = 'canceled' THEN 2
            ELSE 3
        END AS HIDDEN status_order
    ");

        $allowedSortFields = ['a.createdAt', 'a.status', 'c.firstname', 'c.lastname'];
        if (!in_array($sortField, $allowedSortFields)) {
            $sortField = 'a.createdAt';
        }

        $qb->orderBy('status_order', 'ASC')
            ->addOrderBy($sortField, $sortDirection);

        return $qb;
    }

    //    /**
    //     * @return Appointment[] Returns an array of Appointment objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Appointment
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
