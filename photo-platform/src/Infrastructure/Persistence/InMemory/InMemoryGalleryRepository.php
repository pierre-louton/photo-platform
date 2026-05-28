<?php

declare(strict_types=1);

namespace PhotoPlatform\Infrastructure\Persistence\InMemory;

use PhotoPlatform\Domain\Gallery\Entity\Gallery;
use PhotoPlatform\Domain\Gallery\Repository\GalleryRepository;

final class InMemoryGalleryRepository implements GalleryRepository
{
    private array $items = [];

    public function save(Gallery $gallery): void
    {
        $this->items[$gallery->id()] = $gallery;
    }

    public function get(string $id): ?Gallery
    {
        return $this->items[$id] ?? null;
    }
}