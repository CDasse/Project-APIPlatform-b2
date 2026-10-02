<?php

namespace App\Dto\Trip;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

final class TripSearchInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Uuid]
        #[ApiProperty(required: true,
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => "L'identifiant unique de la ville d'origine'."
            ]
        )]
        public string $origin,

        #[ApiProperty(required: true,
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => "L'identifiant unique de la ville de destination."
            ]
        )]
        #[Assert\NotBlank]
        #[Assert\Uuid]
        public string $destination,

        #[ApiProperty(required: true,
            schema: [
                'type' => 'string',
                'format' => 'date',
                'minimum' => new \DateTime('now'),
                'description' => "Date du trajet."
            ]
        )]
        #[Assert\NotBlank]
        #[Assert\Date]
        public string $date,

        #[ApiProperty(required: true,
            schema: [
                'type' => 'integer',
                'minimum' => 1,
                'description' => "Nombre de passagers."
            ]
        )]
        #[Assert\NotBlank]
        #[Assert\Positive]
        public int $passengers,
    )
    {
    }
}
