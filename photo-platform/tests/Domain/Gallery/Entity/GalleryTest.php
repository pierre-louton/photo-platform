<?php

declare(strict_types=1);

namespace PhotoPlatform\Tests\Domain\Gallery\Entity;

use PHPUnit\Framework\TestCase;
use PhotoPlatform\Domain\Gallery\Entity\Gallery;

final class GalleryTest extends TestCase
{
    public function test_it_creates_gallery(): void
    {
        $gallery = Gallery::create(
            'gallery-001',
            'portfolio',
            'Portfolio'
        );

        self::assertSame('gallery-001', $gallery->id());
        self::assertSame('portfolio', $gallery->slug()->value());
        self::assertSame('Portfolio', $gallery->title());
    }
}