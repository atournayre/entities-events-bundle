<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostRemoveService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::postRemove, priority: 128)]
final readonly class PostRemoveListener
{
    public function __construct(
        private PostRemoveService $postRemove,
    )
    {
    }

    public function __invoke(PostRemoveEventArgs $postRemoveEventArgs): void
    {
        ($this->postRemove)($postRemoveEventArgs);
    }
}
