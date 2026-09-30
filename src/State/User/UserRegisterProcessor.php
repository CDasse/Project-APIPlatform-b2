<?php

namespace App\State\User;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\User\UserDetailsOutput;
use App\Dto\User\UserRegisterInput;
use App\Service\UserService;

/**
 * @implements ProcessorInterface<UserRegisterInput, UserDetailsOutput>
 */
final readonly class UserRegisterProcessor implements ProcessorInterface
{
    public function __construct(
        private UserService $userService,
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): UserDetailsOutput
    {
        $user = $this->userService->register($data);

        return $this->userService->toDetails($user);
    }
}
