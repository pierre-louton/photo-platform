<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Application\Handler;

use PhotoPlatform\Catalog\Application\Command\AcceptClassificationCommand;
use PhotoPlatform\Catalog\Domain\Classification\Repository\ClassificationRepository;
use PhotoPlatform\Shared\Clock\Clock;
use RuntimeException;

final readonly class AcceptClassificationHandler
{
    public function __construct(
        private ClassificationRepository $repository,
        private Clock $clock,
    ) {
    }

    public function handle(
        AcceptClassificationCommand $command,
    ): void {
        $classification = $this->repository->findById(
            $command->classificationId()
        );

        if ($classification === null) {
            throw new RuntimeException(
                'Classification not found.'
            );
        }

        $classification->accept(
            $this->clock->now()
        );

        $this->repository->save(
            $classification
        );
    }
}