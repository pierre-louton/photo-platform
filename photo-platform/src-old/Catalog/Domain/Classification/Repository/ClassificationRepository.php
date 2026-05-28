<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\Repository;

use PhotoPlatform\Catalog\Domain\Classification\Entity\Classification;
use PhotoPlatform\Shared\Identity\Uuid;

interface ClassificationRepository
{
    public function save(
        Classification $classification,
    ): void;

    public function delete(
        Classification $classification,
    ): void;

    public function findById(
        Uuid $id,
    ): ?Classification;

    /**
     * @return array<Classification>
     */
    public function findByPhotoId(
        Uuid $photoId,
    ): array;

    /**
     * @return array<Classification>
     */
    public function findAcceptedByPhotoId(
        Uuid $photoId,
    ): array;

    /**
     * @return array<Classification>
     */
    public function findSuggestedByPhotoId(
        Uuid $photoId,
    ): array;

    public function existsActiveClassification(
        Uuid $photoId,
        Uuid $collectionId,
    ): bool;
}