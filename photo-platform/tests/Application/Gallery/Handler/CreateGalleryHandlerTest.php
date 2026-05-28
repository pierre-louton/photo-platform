<?php

declare(strict_types=1);

namespace PhotoPlatform\Tests\Application\Gallery\Handler;

use PHPUnit\Framework\TestCase;
use PhotoPlatform\Application\Gallery\Handler\CreateGalleryHandler;
use PhotoPlatform\Infrastructure\Persistence\InMemory\InMemoryGalleryRepository;

final class CreateGalleryHandlerTest extends TestCase
{
    public function test_it_creates_gallery(): void
    {
        $repository = new InMemoryGalleryRepository();

        $handler = new CreateGalleryHandler(
            $repository
        );

        $gallery = $handler->handle(
            'gallery-001',
            'portfolio',
            'Portfolio'
        );

        self::assertSame(
            'gallery-001',
            $gallery->id()
        );

        self::assertSame(
            'portfolio',
            $gallery->slug()->value()
        );

        self::assertSame(
            'Portfolio',
            $gallery->title()
        );

        self::assertNotNull(
            $repository->get('gallery-001')
        );
    }
}