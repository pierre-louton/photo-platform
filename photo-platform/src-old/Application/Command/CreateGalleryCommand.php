<?php

declare(strict_types=1);

namespace PhotoPlatform\Application\Gallery\Command;

final readonly class CreateGalleryCommand
{
    public function __construct(
        public string $id,
        public string $title
    ) {
    }
}