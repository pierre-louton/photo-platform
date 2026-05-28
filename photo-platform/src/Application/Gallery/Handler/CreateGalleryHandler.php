<?php

declare(strict_types=1);

namespace PhotoPlatform\Application\Gallery\Handler;

use PhotoPlatform\Domain\Gallery\Entity\Gallery;
use PhotoPlatform\Domain\Gallery\Repository\GalleryRepository;

final class CreateGalleryHandler
{
    public function __construct(
        private readonly GalleryRepository $repository,
    ) {
    }

    public function handle(
        string $id,
        string $slug,
        string $title,
    ): Gallery {
        $gallery = Gallery::create(
            $id,
            $slug,
            $title,
        );

        $this->repository->save($gallery);

        return $gallery;
    }
}