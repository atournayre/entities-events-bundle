<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PrePersistService;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;

//#[AsDoctrineListener(event: Events::prePersist, priority: 128)]
final readonly class PrePersistListener
{
    public function __construct(
        private PrePersistService $prePersist,
    )
    {
    }

    public function __invoke(PrePersistEventArgs $prePersistEventArgs): void
    {
        ($this->prePersist)($prePersistEventArgs);
    }
}
