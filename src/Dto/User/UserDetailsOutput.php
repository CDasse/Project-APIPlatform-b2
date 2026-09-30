<?php

namespace App\Dto\User;

use ApiPlatform\Metadata\ApiProperty;
use DateTimeImmutable;

class UserDetailsOutput
{
    public function __construct(
        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'uuid',
            'description' => "Identifiant unique de l'utilisateur."
        ])]
        public string $id,

        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'email',
            'description' => "Email de l'utilisateur."
        ])]
        public string $email,

        #[ApiProperty(schema: [
            'type' => 'string',
            'format' => 'date-time',
            'description' => "Date de création du compte de l'utilisateur."
        ])]
        public DateTimeImmutable $createdAt,

        #[ApiProperty(schema: [
            'type' => 'string',
            'description' => "Prénom de l'utilisateur.",
            'example' => 'Alice',
            'nullable' => true
        ])]
        public ?string $firstName = null,

        #[ApiProperty(schema: [
            'type' => 'string',
            'description' => "Nom de l'utilisateur.",
            'example' => 'Doe',
            'nullable' => true
        ])]
        public ?string $lastName = null,
    )
    {
    }
}
