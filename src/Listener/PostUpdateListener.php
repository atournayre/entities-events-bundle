<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostUpdateService;
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
