<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Contracts;

use Atournayre\Bundle\EntitiesEventsBundle\Collection\EventCollection;
use Symfony\Contracts\EventDispatcher\Event;

interface HasEventsInterface
{
    public function addEvent(Event $event): void;

    public function getEventCollection(): EventCollection;

    public function clearEvents(): void;
}
