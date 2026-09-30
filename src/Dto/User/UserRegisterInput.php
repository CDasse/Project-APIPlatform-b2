<?php

namespace App\Dto\User;

use ApiPlatform\Metadata\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

class UserRegisterInput
{
    public function __construct (
        #[Assert\NotBlank]
        #[Assert\Email]
        #[Assert\Length(min: 3, max: 255)]
        #[ApiProperty(required: true,
            schema: [
                'type' => 'string',
                'format' => 'email',
                'minLength' => 3,
                'maxLength' => 255,
                'description' => "L'email de l'utilisateur (doit être unique).",
                'example' => 'user@example.com'
            ])]
        public string $email,

    #[Assert\NotBlank]
    #[Assert\PasswordStrength]
    #[Assert\Length(min: 8, max: 255)]
    #[ApiProperty(required: true,
        schema: [
            'type' => 'string',
            'format' => 'password',
            'minLength' => 8,
            'maxLength' => 255,
            'description' => "Mot de passe de l'utilisateur.",
            'example' => 'MonSuperMotDePasse'
        ])]
    public string $password,

    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(min: 3, max: 255)]
    #[ApiProperty(schema: [
        'type' => 'string',
        'minLength' => 3,
        'maxLength' => 255,
        'description' => "Prénom de l'utilisateur.",
        'example' => 'Alice'
    ])]
    public ?string $firstName = null,

    #[Assert\NotBlank(allowNull: true)]
    #[Assert\Length(min: 3, max: 255)]
    #[ApiProperty(schema: [
        'type' => 'string',
        'minLength' => 3,
        'maxLength' => 255,
        'description' => "Nom de l'utilisateur.",
        'example' => 'Doe'
    ])]
    public ?string $lastName = null,
    )
    {
    }
}
