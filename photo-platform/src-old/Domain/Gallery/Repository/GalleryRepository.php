<?php

declare(strict_types=1);

namespace PhotoPlatform\Infrastructure\Persistence\InMemory;

use PhotoPlatform\Domain\Gallery\Entity\Gallery;
use PhotoPlatform\Domain\Gallery\Repository\GalleryRepository;
use PhotoPlatform\Domain\Gallery\ValueObject\GalleryId;

final class InMemoryGalleryRepository
implements GalleryRepository
{
    /**
     * @var array<string, Gallery>
     */
    private array $galleries = [];

    public function save(
        Gallery $gallery
    ): void {
        $this->galleries[
            (string) $gallery->id()
        ] = $gallery;
    }

    public function getById(
        GalleryId $id
    ): ?Gallery {
        return $this->galleries[
            (string) $id
        ] ?? null;
    }
}