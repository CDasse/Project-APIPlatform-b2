<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

final class TripSearchInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Uuid]
        #[ApiProperty(
            required: true,
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => "L'identifiant unique de la ville d'origine'."
            ]
        )]
        public string $origin,

        #[ApiProperty(
            required: true,
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => "L'identifiant unique de la ville de destination."
            ]
        )]
        #[Assert\NotBlank]
        #[Assert\Uuid]
        public string $destination,

        #[Assert\NotBlank]
        #[Assert\Date]
        #[ApiProperty(
            required: true,
            schema: [
                'type' => 'string',
                'format' => 'date',
                'minimum' => new \DateTime('now'),
                'description' => "Date du trajet."
            ]
        )]
        public string $date,

        #[Assert\NotBlank]
        #[Assert\Positive]
        #[ApiProperty(
            required: true,
            schema: [
                'type' => 'integer',
                'minimum' => 1,
                'description' => "Nombre de passagers."
            ]
        )]
        public int $passengers,
    )
    {
    }
}
