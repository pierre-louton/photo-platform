<?php

declare(strict_types=1);

namespace PhotoPlatform\Shared\Clock;

use DateTimeImmutable;

final class SystemClock implements Clock
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}