<?php
declare(strict_types=1);

namespace PhotoPlatform\Application\Bus;

interface CommandBus
{
    public function dispatch(object $command): void;
}
