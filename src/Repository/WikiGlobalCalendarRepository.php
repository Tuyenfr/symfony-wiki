<?php

namespace App\Repository;

use App\Entity\WikiGlobalCalendar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WikiGlobalCalendar>
 *
 * @method WikiGlobalCalendar|null find($id, $lockMode = null, $lockVersion = null)
 * @method WikiGlobalCalendar|null findOneBy(array $criteria, array $orderBy = null)
 * @method WikiGlobalCalendar[]    findAll()
 * @method WikiGlobalCalendar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WikiGlobalCalendarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WikiGlobalCalendar::class);
    }


    /**
     * @return WikiGlobalCalendar[] Returns an array of WikiGlobalCalendar objects
     */
    public function findFieldsById($id)
    {
        return $this->createQueryBuilder('p')
            ->select('p.start_date', 'p.end_date')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(); // ou ->getResult() si vous attendez plusieurs résultats
    }

    //    /**
    //     * @return WikiGlobalCalendar[] Returns an array of WikiGlobalCalendar objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WikiGlobalCalendar
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
