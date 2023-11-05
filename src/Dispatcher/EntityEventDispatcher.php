<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Dispatcher;

use Atournayre\Bundle\EntitiesEventsBundle\Collection\EventCollection;
use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;

readonly class EntityEventDispatcher implements EntityEventDispatcherInterface
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private LoggerInterface          $logger,
    )
    {
    }

    public function dispatch(EventCollection $eventCollection): void
    {
        foreach ($eventCollection->toArray() as $event) {
            $this->logger->debug(sprintf('Dispatch event %s', get_class($event)));
            $this->eventDispatcher->dispatch($event);
            $this->logger->debug(sprintf('Event %s dispatched', get_class($event)));
        }
    }
}
