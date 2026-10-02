<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use App\Dto\City\CityListOutput;
use Symfony\Component\Uid\Uuid;

class TripListOutput
{
    public function __construct(
        #[ApiProperty(
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => 'Identifiant unique du trajet.'
            ]
        )]
        public readonly Uuid $id,

        #[ApiProperty(
            schema: [
                'description' => "Ville d'origine."
            ]
        )]
        public readonly CityListOutput $origin,

        #[ApiProperty(
            schema: [
                'description' => "Ville de destination."
            ]
        )]
        public readonly CityListOutput $destination,

        #[ApiProperty(
            schema: [
                'type' => 'string',
                'format' => 'date-time',
                'description' => "Date et heure de départ."
            ]
        )]
        public readonly \DateTimeImmutable $departureAt,

        #[ApiProperty(
            schema: [
                'type' => 'integer',
                'description' => "Durée du voyage en minutes."
            ]
        )]
        public readonly int $duration,

        #[ApiProperty(
            schema: [
                'type' => 'integer',
                'description' => "Prix du voyage en centimes."
            ]
        )]
        public readonly int $price,
    ) {
    }
}
