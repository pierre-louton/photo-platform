<?php

declare(strict_types=1);

namespace PhotoPlatform\Infrastructure\WordPress;

use PhotoPlatform\Application\Gallery\Command\CreateGalleryCommand;
use PhotoPlatform\Application\Gallery\Handler\CreateGalleryHandler;
use PhotoPlatform\Infrastructure\Persistence\InMemory\InMemoryGalleryRepository;

final class Plugin
{
    public function boot(): void
    {
        add_action(
            'init',
            [$this, 'onInit']
        );
    }

    public function onInit(): void
    {
        error_log(
            'Photo Platform initialized'
        );

        $repository =
            new InMemoryGalleryRepository();

        $handler =
            new CreateGalleryHandler(
                $repository
            );

        $gallery = $handler->handle(
            new CreateGalleryCommand(
                'gallery-001',
                'Reportage Paris'
            )
        );

        error_log(
            $gallery->title()
        );
    }
}