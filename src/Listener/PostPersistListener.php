<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PostPersistService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::postPersist, priority: 128)]
final readonly class PostPersistListener
{
    public function __construct(
        private PostPersistService $postPersist,
    )
    {
    }

    public function __invoke(PostPersistEventArgs $postPersistEventArgs): void
    {
        ($this->postPersist)($postPersistEventArgs);
    }
}
