<?php
declare(strict_types=1);

namespace PhotoPlatform\Domain\Shared\Aggregate;

use PhotoPlatform\Domain\Shared\Event\DomainEvent;

abstract class AggregateRoot
{
    /** @var DomainEvent[] */
    private array $events = [];

    final protected function record(DomainEvent $event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return DomainEvent[]
     */
    final public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
