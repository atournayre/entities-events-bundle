<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Traits;

use Atournayre\Bundle\EntitiesEventsBundle\Collection\EventCollection;
use Symfony\Contracts\EventDispatcher\Event;

trait EventsTrait
{
    protected EventCollection $eventCollection;

    public function addEvent(Event $event): void
    {
        $this->initializeEventCollection();
        $this->eventCollection->add($event);
    }

    private function initializeEventCollection(): void
    {
        if (!isset($this->eventCollection)) {
            $this->eventCollection = new EventCollection();
        }
    }

    public function getEventCollection(): EventCollection
    {
        $this->initializeEventCollection();
        return $this->eventCollection;
    }

    public function clearEvents(): void
    {
        $this->initializeEventCollection();
        $this->eventCollection->clear();
    }
}
