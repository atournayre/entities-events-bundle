<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostUpdateService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PostUpdateEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::postUpdate, priority: 128)]
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
