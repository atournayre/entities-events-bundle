<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\HasEventsInterface;
use Doctrine\ORM\Event\PostPersistEventArgs;

final readonly class PostPersistService
{
    public function __construct(
        private EntityEventDispatcherInterface $entityEventDispatcher,
        private EntityManagerService $entityManager,
    )
    {
    }

    public function __invoke(PostPersistEventArgs $postPersistEventArgs): void
    {
        $entity = $postPersistEventArgs->getObject();
        if (!$entity instanceof HasEventsInterface) {
            return;
        }

        $this->entityEventDispatcher->dispatch($entity->getEventCollection());
        $entity->clearEvents();
        $this->entityManager->save($entity);
    }
}
