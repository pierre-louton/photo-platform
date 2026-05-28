<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Gallery\ValueObject;

use InvalidArgumentException;

final readonly class GallerySlug
{
    public function __construct(
        private string $value,
    ) {
        if (!preg_match('/^[a-z0-9-]+$/', $value)) {
            throw new InvalidArgumentException(
                'Invalid gallery slug.'
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}