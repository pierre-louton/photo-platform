<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Infrastructure\Persistence\InMemory\Classification;

use PhotoPlatform\Catalog\Domain\Classification\Entity\Classification;
use PhotoPlatform\Catalog\Domain\Classification\Repository\ClassificationRepository;
use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ClassificationState;
use PhotoPlatform\Shared\Identity\Uuid;

final class InMemoryClassificationRepository implements ClassificationRepository
{
    /**
     * @var array<string, Classification>
     */
    private array $classifications = [];

    public function save(
        Classification $classification,
    ): void {
        $this->classifications[
            $classification->id()->value()
        ] = $classification;
    }

    public function delete(
        Classification $classification,
    ): void {
        unset(
            $this->classifications[
                $classification->id()->value()
            ]
        );
    }

    public function findById(
        Uuid $id,
    ): ?Classification {
        return $this->classifications[$id->value()]
            ?? null;
    }

    public function findByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->classifications,
                static fn (Classification $classification): bool =>
                    $classification->photoId()->equals($photoId)
            )
        );
    }

    public function findAcceptedByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->findByPhotoId($photoId),
                static fn (Classification $classification): bool =>
                    $classification
                        ->state()
                        ->isAccepted()
            )
        );
    }

    public function findSuggestedByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->findByPhotoId($photoId),
                static fn (Classification $classification): bool =>
                    $classification
                        ->state()
                        ->isSuggested()
            )
        );
    }

    public function existsActiveClassification(
        Uuid $photoId,
        Uuid $collectionId,
    ): bool {
        foreach (
            $this->findByPhotoId($photoId)
            as $classification
        ) {
            if (
                $classification
                    ->collectionId()
                    ->equals($collectionId)
                &&
                !$classification
                    ->state()
                    ->isRejected()
            ) {
                return true;
            }
        }

        return false;
    }
}<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Infrastructure\Persistence\InMemory\Classification;

use PhotoPlatform\Catalog\Domain\Classification\Entity\Classification;
use PhotoPlatform\Catalog\Domain\Classification\Repository\ClassificationRepository;
use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ClassificationState;
use PhotoPlatform\Shared\Identity\Uuid;

final class InMemoryClassificationRepository implements ClassificationRepository
{
    /**
     * @var array<string, Classification>
     */
    private array $classifications = [];

    public function save(
        Classification $classification,
    ): void {
        $this->classifications[
            $classification->id()->value()
        ] = $classification;
    }

    public function delete(
        Classification $classification,
    ): void {
        unset(
            $this->classifications[
                $classification->id()->value()
            ]
        );
    }

    public function findById(
        Uuid $id,
    ): ?Classification {
        return $this->classifications[$id->value()]
            ?? null;
    }

    public function findByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->classifications,
                static fn (Classification $classification): bool =>
                    $classification->photoId()->equals($photoId)
            )
        );
    }

    public function findAcceptedByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->findByPhotoId($photoId),
                static fn (Classification $classification): bool =>
                    $classification
                        ->state()
                        ->isAccepted()
            )
        );
    }

    public function findSuggestedByPhotoId(
        Uuid $photoId,
    ): array {
        return array_values(
            array_filter(
                $this->findByPhotoId($photoId),
                static fn (Classification $classification): bool =>
                    $classification
                        ->state()
                        ->isSuggested()
            )
        );
    }

    public function existsActiveClassification(
        Uuid $photoId,
        Uuid $collectionId,
    ): bool {
        foreach (
            $this->findByPhotoId($photoId)
            as $classification
        ) {
            if (
                $classification
                    ->collectionId()
                    ->equals($collectionId)
                &&
                !$classification
                    ->state()
                    ->isRejected()
            ) {
                return true;
            }
        }

        return false;
    }
}