<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Application\Command;

use PhotoPlatform\Shared\Identity\Uuid;

final readonly class AcceptClassificationCommand
{
    public function __construct(
        private Uuid $classificationId,
    ) {
    }

    public function classificationId(): Uuid
    {
        return $this->classificationId;
    }
}