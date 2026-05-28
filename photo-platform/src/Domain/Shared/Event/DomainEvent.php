<?php
declare(strict_types=1);

namespace PhotoPlatform\Domain\Shared\Event;

interface DomainEvent
{
    public function occurredOn(): \DateTimeImmutable;
}
