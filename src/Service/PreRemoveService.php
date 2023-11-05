<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PreRemoveEventArgs;

final readonly class PreRemoveService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
    )
    {
    }

    public function __invoke(PreRemoveEventArgs $preRemoveEventArgs): void
    {
        $entity = $preRemoveEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
    }
}
