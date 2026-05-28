<?php

declare(strict_types=1);

namespace PhotoPlatform\Shared\Clock;

use DateTimeImmutable;

interface Clock
{
    public function now(): DateTimeImmutable;
}