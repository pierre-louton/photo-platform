<?php

declare(strict_types=1);

namespace PhotoPlatform\Application\Gallery\Handler;

use PhotoPlatform\Application\Gallery\Command\CreateGalleryCommand;
use PhotoPlatform\Domain\Gallery\Entity\Gallery;
use PhotoPlatform\Domain\Gallery\Repository\GalleryRepository;
use PhotoPlatform\Domain\Gallery\ValueObject\GalleryId;

final readonly class CreateGalleryHandler
{
    public function __construct(
        private GalleryRepository $galleryRepository
    ) {
    }

    public function handle(
        CreateGalleryCommand $command
    ): Gallery {
        $gallery = new Gallery(
            new GalleryId($command->id),
            $command->title
        );

        $this->galleryRepository->save(
            $gallery
        );

        return $gallery;
    }
}