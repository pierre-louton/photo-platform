<?php

declare(strict_types=1);

namespace PhotoPlatform\Shared\Event;

use DateTimeImmutable;

interface DomainEvent
{
    public function occurredAt(): DateTimeImmutable;

    public function eventName(): string;
}