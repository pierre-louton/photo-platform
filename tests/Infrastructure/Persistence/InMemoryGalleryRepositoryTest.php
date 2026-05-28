<?php

declare(strict_types=1);

namespace Tests\Infrastructure\Persistence;

use PHPUnit\Framework\TestCase;
use PhotoPlatform\Domain\Gallery\Gallery;
use PhotoPlatform\Domain\Gallery\ValueObject\GallerySlug;
use PhotoPlatform\Infrastructure\Persistence\InMemory\InMemoryGalleryRepository;

final class InMemoryGalleryRepositoryTest extends TestCase
{
    public function test_it_stores_gallery(): void
    {
        $repository = new InMemoryGalleryRepository();

        $gallery = new Gallery(
            'gallery-001',
            GallerySlug::fromString('mariage'),
            'Mariage'
        );

        $repository->save($gallery);

        self::assertNotNull($repository->get('gallery-001'));
    }
}
