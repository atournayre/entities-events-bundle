<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Contracts;

use Atournayre\Bundle\EntitiesEventsBundle\Collection\EventCollection;

interface EntityEventDispatcherInterface
{
    public function dispatch(EventCollection $eventCollection): void;
}
