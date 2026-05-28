<?php

declare(strict_types=1);

namespace PhotoPlatform\Tests\Domain\Gallery\ValueObject;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PhotoPlatform\Domain\Gallery\ValueObject\GallerySlug;

final class GallerySlugTest extends TestCase
{
    public function test_it_creates_valid_slug(): void
    {
        $slug = GallerySlug::fromString('portfolio');

        self::assertSame('portfolio', $slug->value());
    }

    public function test_it_normalizes_slug(): void
    {
        $slug = GallerySlug::fromString(' Portfolio ');

        self::assertSame('portfolio', $slug->value());
    }

    public function test_it_rejects_empty_slug(): void
    {
        $this->expectException(InvalidArgumentException::class);

        GallerySlug::fromString('');
    }

    public function test_it_rejects_whitespace_slug(): void
    {
        $this->expectException(InvalidArgumentException::class);

        GallerySlug::fromString('   ');
    }

    public function test_it_rejects_invalid_slug(): void
    {
        $this->expectException(InvalidArgumentException::class);

        GallerySlug::fromString('Mon Portfolio !');
    }
}