<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Photo\ValueObject;

use InvalidArgumentException;

final readonly class Checksum
{
    public function __construct(
        private string $value,
    ) {
        if (!preg_match('/^[a-f0-9]{64}$/', $value)) {
            throw new InvalidArgumentException(
                'Invalid SHA-256 checksum.'
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}