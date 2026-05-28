<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\Entity;

use DateTimeImmutable;
use PhotoPlatform\Catalog\Domain\Classification\Exception\ClassificationAlreadyRejectedException;
use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ClassificationSource;
use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ClassificationState;
use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ConfidenceScore;
use PhotoPlatform\Shared\Identity\Uuid;

final class Classification
{
    public function __construct(
        private readonly Uuid $id,
        private readonly Uuid $photoId,
        private readonly Uuid $collectionId,
        private ClassificationSource $source,
        private ClassificationState $state,
        private ?ConfidenceScore $confidenceScore,
        private readonly DateTimeImmutable $createdAt,
        private DateTimeImmutable $updatedAt,
    ) {
        $this->guardConsistency();
    }

    public function accept(DateTimeImmutable $updatedAt): void
    {
        if ($this->state->isRejected()) {
            throw new ClassificationAlreadyRejectedException(
                'Rejected classification cannot be accepted directly.'
            );
        }

        $this->state = new ClassificationState(
            ClassificationState::ACCEPTED
        );

        $this->updatedAt = $updatedAt;
    }

    public function reject(DateTimeImmutable $updatedAt): void
    {
        $this->state = new ClassificationState(
            ClassificationState::REJECTED
        );

        $this->updatedAt = $updatedAt;
    }

    public function promoteToManual(DateTimeImmutable $updatedAt): void
    {
        $this->source = new ClassificationSource(
            ClassificationSource::MANUAL
        );

        $this->state = new ClassificationState(
            ClassificationState::MANUAL
        );

        $this->confidenceScore = null;

        $this->updatedAt = $updatedAt;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function photoId(): Uuid
    {
        return $this->photoId;
    }

    public function collectionId(): Uuid
    {
        return $this->collectionId;
    }

    public function source(): ClassificationSource
    {
        return $this->source;
    }

    public function state(): ClassificationState
    {
        return $this->state;
    }

    public function confidenceScore(): ?ConfidenceScore
    {
        return $this->confidenceScore;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    private function guardConsistency(): void
    {
        if (
            $this->state->isManual()
            && $this->confidenceScore !== null
        ) {
            throw new \InvalidArgumentException(
                'Manual classifications cannot have confidence score.'
            );
        }

        if (
            !$this->state->isManual()
            && $this->source->value() !== ClassificationSource::MANUAL
            && $this->confidenceScore === null
        ) {
            return;
        }
    }
}