<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Collection\ValueObject;

use InvalidArgumentException;

final readonly class CollectionName
{
    public function __construct(
        private string $value,
    ) {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException(
                'Collection name cannot be empty.'
            );
        }

        if (mb_strlen($value) > 120) {
            throw new InvalidArgumentException(
                'Collection name is too long.'
            );
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return mb_strtolower($this->value)
            === mb_strtolower($other->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}