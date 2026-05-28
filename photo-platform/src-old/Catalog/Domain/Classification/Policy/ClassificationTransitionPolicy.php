<?php

declare(strict_types=1);

namespace PhotoPlatform\Catalog\Domain\Classification\Policy;

use PhotoPlatform\Catalog\Domain\Classification\ValueObject\ClassificationState;

final class ClassificationTransitionPolicy
{
    public function canTransition(
        ClassificationState $from,
        ClassificationState $to,
    ): bool {
        if (
            $from->isRejected()
            && $to->isAccepted()
        ) {
            return false;
        }

        return true;
    }
}