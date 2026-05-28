<?php

declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\Repository;

use PhotoPlatform\Domain\Gallery\Entity\Gallery;

interface GalleryRepository
{
    public function save(Gallery $gallery): void;

    public function get(string $id): ?Gallery;
}