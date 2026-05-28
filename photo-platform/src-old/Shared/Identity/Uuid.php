<?php

declare(strict_types=1);

namespace PhotoPlatform\Shared\Identity;

use InvalidArgumentException;

final readonly class Uuid
{
    public function __construct(
        private string $value,
    ) {
        if (!self::isValid($value)) {
            throw new InvalidArgumentException(
                sprintf('Invalid UUID: "%s"', $value)
            );
        }
    }

    public static function generate(): self
    {
        return new self(uuid_create(UUID_TYPE_RANDOM));
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

    private static function isValid(string $value): bool
    {
        return (bool) preg_match(
            '/^[0-9a-fA-F-]{36}$/',
            $value
        );
    }
}