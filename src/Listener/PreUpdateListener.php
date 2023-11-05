<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Listener;

use Atournayre\Bundle\EntitiesEventsBundle\Service\PreUpdateService;
use Doctrine\ORM\Event\PreUpdateEventArgs;

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
