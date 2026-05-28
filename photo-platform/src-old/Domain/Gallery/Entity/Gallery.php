<?php

declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\Entity;

use PhotoPlatform\Domain\Gallery\ValueObject\GalleryId;

final class Gallery
{
    private bool $published = false;

    public function __construct(
        private GalleryId $id,
        private string $title
    ) {
        if ($title === '') {
            throw new \InvalidArgumentException(
                'Gallery title cannot be empty'
            );
        }
    }

    public function id(): GalleryId
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function publish(): void
    {
        $this->published = true;
    }

    public function isPublished(): bool
    {
        return $this->published;
    }
}