<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PreUpdateEventArgs;

final readonly class PreUpdateService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
    )
    {
    }

    public function __invoke(PreUpdateEventArgs $preUpdateEventArgs): void
    {
        $entity = $preUpdateEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
    }
}
