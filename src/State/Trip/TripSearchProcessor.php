<?php

namespace App\State\Trip;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Dto\Trip\TripListOutput;
use App\Dto\Trip\TripSearchInput;
use App\Service\TripService;

/**
 * @implements ProcessorInterface<TripSearchInput, TripListOutput[]>
 */
final class TripSearchProcessor implements ProcessorInterface
{

    public function __construct(
        private readonly TripService $tripService,
    ) {
    }

    /**
     * Serves the trips matching the submitted search, mapped onto their list payload.
     *
     * @return TripListOutput[]
     * @throws \DateMalformedStringException
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): array
    {
        $trips = $this->tripService->search($data);

        return array_map($this->tripService->toList(...), $trips);
    }
}
