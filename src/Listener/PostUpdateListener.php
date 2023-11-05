<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Doctrine\ORM\Event\PostUpdateEventArgs;

final readonly class PostUpdateListener
{
    public function __construct(
        private PostUpdateService $postUpdate,
    )
    {
    }

    public function __invoke(PostUpdateEventArgs $postUpdateEventArgs): void
    {
        ($this->postUpdate)($postUpdateEventArgs);
    }
}
