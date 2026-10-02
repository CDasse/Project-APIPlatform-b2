<?php

namespace App\Repository;

use App\Entity\City;
use App\Entity\Trip;
use DateMalformedStringException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trip>
 */
class TripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);
    }

    /** @return Trip[]
     * @throws DateMalformedStringException
     */
    public function search(City $origin, City $destination, \DateTimeImmutable $day): array
    {
        $dayStart = $day->setTime(0,0);
        $dayEnd = $dayStart->modify('+1 day');

        return $this->createQueryBuilder('trip')
            ->andWhere('trip.deletedAt is NULL')
            ->andWhere('trip.origin = :origin')
            ->andWhere('trip.destination = :destination')
            ->andWhere('trip.departureAt >= :dayStart')
            ->andWhere('trip.departureAt < :dayEnd')
            ->orderBy('trip.departureAt', 'ASC')
            ->setParameter('origin', $origin)
            ->setParameter('destination', $destination)
            ->setParameter('dayStart', $dayStart)
            ->setParameter('dayEnd', $dayEnd)
            ->getQuery()
            ->getResult();
    }
}
