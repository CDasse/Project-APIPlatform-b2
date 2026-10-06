<?php

namespace App\Dto\Cart;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

final class CartAddLineInput
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Uuid]
        #[ApiProperty(
            required: true,
            schema: [
                'type' => 'string',
                'format' => 'uuid',
                'description' => "L'identifiant unique du voyage."
            ]
        )]
        public string $tripId,

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
