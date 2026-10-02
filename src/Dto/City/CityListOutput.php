<?php

namespace App\Dto\City;
use ApiPlatform\Metadata\ApiProperty;

final class CityListOutput
{
    public function __construct(
        #[ApiProperty(schema: [
            'type' => "string",
            'format' => 'uuid',
            'description' => "Identifiant unique de la ville."
        ])]
        public string $id,

        #[ApiProperty(schema: [
            'type' => "string",
            'description' => "Nom de la ville."
        ])]
        public string $name,
    )
    {
    }
}
