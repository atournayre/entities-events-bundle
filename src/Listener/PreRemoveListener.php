<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Service;

use Doctrine\ORM\Event\PreRemoveEventArgs;

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
