<?php

namespace App\Dto\Cart;

use ApiPlatform\Metadata\ApiProperty;
use App\Dto\Ticket\TicketListOutput;

class CartPayOutput
{
    public function __construct(
        #[ApiProperty(
            schema: [
                'type' => 'string',
                'description' => 'La référence de confirmation.',
                'example' => 'OTBN-2026-4F2A9C'
            ]
        )]
        public readonly string $confirmation,

        #[ApiProperty(description: "Billets émis, un par place réservée")]
        /**
         * @param TicketListOutput[] $tickets
         */
        public readonly array $tickets,
    )
    {
    }
}
