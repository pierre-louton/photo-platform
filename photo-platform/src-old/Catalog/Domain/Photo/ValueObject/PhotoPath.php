<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Photo\ValueObject;

use InvalidArgumentException;

final readonly class PhotoPath
{
    public function __construct(
        private string $value,
    ) {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException(
                'Photo path cannot be empty.'
            );
        }

        $this->value = $value;
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