<?php
declare(strict_types=1);

namespace PhotoPlatform\Application\Gallery\Command;

final class CreateGalleryCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $slug
    ) {
    }
}
