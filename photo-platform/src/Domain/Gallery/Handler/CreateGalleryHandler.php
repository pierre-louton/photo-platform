<?php

declare(strict_types=1);

namespace PhotoPlatform\Application\Gallery\Handler;

use PhotoPlatform\Application\Gallery\Command\CreateGalleryCommand;
use PhotoPlatform\Domain\Gallery\Entity\Gallery;
use PhotoPlatform\Domain\Gallery\Repository\GalleryRepository;
use PhotoPlatform\Domain\Gallery\ValueObject\GalleryId;

final class CreateGalleryHandler
{
    public function __construct(
        private readonly GalleryRepository $repository
    ) {
    }

    public function __invoke(CreateGalleryCommand $command): void
    {
        $gallery = Gallery::create(
            new GalleryId('gallery-001'),
            $command->name,
            $command->slug
        );

        $this->repository->save($gallery);
    }
}