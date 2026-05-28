<?php
declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\ValueObject;

final class GalleryId
{
    public function __construct(
        private readonly string $value
    ) {
        if ($value === '') {
            throw new \InvalidArgumentException('GalleryId cannot be empty');
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
