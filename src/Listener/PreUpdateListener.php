<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PreUpdateService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::preUpdate, priority: 128)]
final readonly class PreUpdateListener
{
    public function __construct(
        private PreUpdateService $preUpdate,
    )
    {
    }

    public function __invoke(PreUpdateEventArgs $preUpdateEventArgs): void
    {
        ($this->preUpdate)($preUpdateEventArgs);
    }
}
