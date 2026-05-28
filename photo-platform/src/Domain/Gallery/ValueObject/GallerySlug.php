<?php

declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\ValueObject;

use InvalidArgumentException;

final class GallerySlug
{
    private function __construct(
        private readonly string $value,
    ) {
    }

    public static function fromString(string $value): self
    {
        $normalized = trim(strtolower($value));

        if ($normalized === '') {
            throw new InvalidArgumentException(
                'Gallery slug cannot be empty.'
            );
        }

        if (!preg_match('/^[a-z0-9-]+$/', $normalized)) {
            throw new InvalidArgumentException(
                'Gallery slug contains invalid characters.'
            );
        }

        return new self($normalized);
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