<?php

declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\ValueObject;

final readonly class GalleryId
{
    public function __construct(
        private string $value
    ) {
        if ($value === '') {
            throw new \InvalidArgumentException(
                'GalleryId cannot be empty'
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