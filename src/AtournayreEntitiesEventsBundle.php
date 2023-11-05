<?php

namespace Atournayre\Bundle\EntitiesEventsBundle;

use Atournayre\Bundle\EntitiesEventsBundle\DependencyInjection\EventsExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AtournayreEntitiesEventsBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new EventsExtension();
        }
        return $this->extension;
    }
}
