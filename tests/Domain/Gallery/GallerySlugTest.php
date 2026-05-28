<?php

declare(strict_types=1);

namespace Tests\Domain\Gallery;

use PHPUnit\Framework\TestCase;
use PhotoPlatform\Domain\Gallery\ValueObject\GallerySlug;

final class GallerySlugTest extends TestCase
{
    public function test_it_normalizes_slug(): void
    {
        $slug = GallerySlug::fromString(' Portfolio ');

        self::assertSame('portfolio', $slug->value());
    }

    public function test_it_rejects_empty_slug(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        GallerySlug::fromString(' ');
    }
}
