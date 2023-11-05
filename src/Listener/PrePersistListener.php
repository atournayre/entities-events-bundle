<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PrePersistService;
use Doctrine\ORM\Event\PrePersistEventArgs;

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
