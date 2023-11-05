<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PrePersistEventArgs;

final readonly class PrePersistService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
    )
    {
    }

    public function __invoke(PrePersistEventArgs $prePersistEventArgs): void
    {
        $entity = $prePersistEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
    }
}
