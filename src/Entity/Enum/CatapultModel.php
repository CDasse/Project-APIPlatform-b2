<?php

namespace App\Entity\Enum;

enum CatapultModel: string
{
    case OnagreM3 = 'Onagre M3';
    case BalisteXR = 'Baliste XR';
    case Mangonneau700 = 'Mangonneau 700';

    /**
     * @return int maxBaggageWeight in kg
     */
    public function maxBaggageWeightKg(): int
    {
        return match ($this) {
            self::OnagreM3 => 23,
            self::BalisteXR => 15,
            self::Mangonneau700 => 32,
        };
    }
}
