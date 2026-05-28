<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\ValueObject;

use InvalidArgumentException;

final readonly class ClassificationState
{
    public const ACCEPTED = 'accepted';
    public const MANUAL = 'manual';
    public const REJECTED = 'rejected';
    public const SUGGESTED = 'suggested';

    private const ALLOWED = [
        self::ACCEPTED,
        self::MANUAL,
        self::REJECTED,
        self::SUGGESTED,
    ];

    public function __construct(
        private string $value,
    ) {
        if (!in_array($value, self::ALLOWED, true)) {
            throw new InvalidArgumentException(
                sprintf('Invalid classification state "%s"', $value)
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

    public function isAccepted(): bool
    {
        return $this->value === self::ACCEPTED;
    }

    public function isRejected(): bool
    {
        return $this->value === self::REJECTED;
    }

    public function isSuggested(): bool
    {
        return $this->value === self::SUGGESTED;
    }

    public function isManual(): bool
    {
        return $this->value === self::MANUAL;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}