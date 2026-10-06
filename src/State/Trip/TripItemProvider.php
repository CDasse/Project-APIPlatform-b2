<?php

namespace App\State\Trip;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\Trip\TripDetailsOutput;
use App\Service\TripService;


class TripItemProvider implements ProviderInterface
{
    public function __construct(
        private readonly TripService $tripService,
    ) {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): TripDetailsOutput
    {
        $trip = $this->tripService->findOneById($uriVariables['id']);

        return $this->tripService->toDetails($trip);
    }
}
