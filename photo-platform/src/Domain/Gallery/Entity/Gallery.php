<?php

declare(strict_types=1);

namespace PhotoPlatform\Domain\Gallery\Entity;

use PhotoPlatform\Domain\Gallery\ValueObject\GallerySlug;

final class Gallery
{
    public function __construct(
        private readonly string $id,
        private readonly GallerySlug $slug,
        private string $title,
    ) {
    }

    public static function create(
        string $id,
        string $slug,
        string $title,
    ): self {
        return new self(
            $id,
            GallerySlug::fromString($slug),
            $title,
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function slug(): GallerySlug
    {
        return $this->slug;
    }

    public function title(): string
    {
        return $this->title;
    }
}