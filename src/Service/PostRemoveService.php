<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PostRemoveEventArgs;

final readonly class PostRemoveService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
        private EntityManagerService $entityManager,
    )
    {
    }

    public function __invoke(PostRemoveEventArgs $postRemoveEventArgs): void
    {
        $entity = $postRemoveEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
        $this->entityManager->save($entity);
    }
}
