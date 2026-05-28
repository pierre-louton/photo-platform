<?php

declare(strict_types=1);

namespace PhotoPlatform\Shared\Event;

use DateTimeImmutable;

abstract class AbstractDomainEvent implements DomainEvent
{
    public function __construct(
        private readonly DateTimeImmutable $occurredAt,
    ) {
    }

    public function occurredAt(): DateTimeImmutable
    {
        return $this->occurredAt;
    }
}