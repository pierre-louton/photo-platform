<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\ValueObject;

use InvalidArgumentException;

final readonly class ClassificationSource
{
    public const AI = 'ai';
    public const EXIF = 'exif';
    public const IMPORTED = 'imported';
    public const INFERRED = 'inferred';
    public const LIGHTROOM = 'lightroom';
    public const MANUAL = 'manual';

    private const ALLOWED = [
        self::AI,
        self::EXIF,
        self::IMPORTED,
        self::INFERRED,
        self::LIGHTROOM,
        self::MANUAL,
    ];

    public function __construct(
        private string $value,
    ) {
        if (!in_array($value, self::ALLOWED, true)) {
            throw new InvalidArgumentException(
                sprintf('Invalid classification source "%s"', $value)
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