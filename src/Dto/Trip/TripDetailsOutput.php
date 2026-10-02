<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use App\Dto\City\CityListOutput;
use Symfony\Component\Uid\Uuid;

final class TripDetailsOutput  extends TripListOutput
{
    public function __construct(
        Uuid $id,
        CityListOutput $origin,
        CityListOutput $destination,
        \DateTimeImmutable $departureAt,
        int $duration,
        int $price,

        #[ApiProperty(schema: [
            'type' => 'integer',
            'description' => 'Poids maximum de baggages en kilos.',
        ])]
        public readonly int $maxBaggageWeightKg,

        #[ApiProperty(schema: [
            'type' => 'string',
            'description' => 'Modèle de la catapulte.',
        ])]
        public readonly string $catapultModel,

        #[ApiProperty(schema: [
            'type' => 'srting',
            'description' => "Informations d'embarquement.",
        ])]
        public readonly string $boardingInfo,
    )
    {
        parent::__construct($id, $origin, $destination, $departureAt, $duration, $price);
    }
}
