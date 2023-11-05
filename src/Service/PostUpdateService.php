<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PostUpdateEventArgs;

final readonly class PostUpdateService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
        private EntityManagerService $entityManager,
    )
    {
    }

    public function __invoke(PostUpdateEventArgs $postUpdateEventArgs): void
    {
        $entity = $postUpdateEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
        $this->entityManager->save($entity);
    }
}
