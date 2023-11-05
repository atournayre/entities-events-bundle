<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\Collection;

use Symfony\Contracts\EventDispatcher\Event;
use Webmozart\Assert\Assert;

class EventCollection
{
    /**
     * @var array|Event[] $events
     */
    private array $events;

    /**
     * @param array|Event[] $events
     */
    public function __construct(array $events = [])
    {
        Assert::allIsInstanceOf($events, Event::class);
        $this->events = $events;
    }

    /**
     * @return array|Event[]
     */
    public function toArray(): array
    {
        return $this->events;
    }

    public function add(Event $event): void
    {
        $this->events[] = $event;
    }

    public function clear(): void
    {
        $this->events = [];
    }
}
