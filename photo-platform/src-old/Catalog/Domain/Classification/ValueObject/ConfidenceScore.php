<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\ValueObject;

use InvalidArgumentException;

final readonly class ConfidenceScore
{
    public function __construct(
        private float $value,
    ) {
        if ($value < 0.0 || $value > 1.0) {
            throw new InvalidArgumentException(
                'Confidence score must be between 0.0 and 1.0'
            );
        }
    }

    public function value(): float
    {
        return $this->value;
    }

    public function greaterThan(self $other): bool
    {
        return $this->value > $other->value;
    }
}