<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PreRemoveService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PreRemoveEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::preRemove, priority: 128)]
final readonly class PreRemoveListener
{
    public function __construct(
        private PreRemoveService $preRemove,
    )
    {
    }

    public function __invoke(PreRemoveEventArgs $preRemoveEventArgs): void
    {
        ($this->preRemove)($preRemoveEventArgs);
    }
}
