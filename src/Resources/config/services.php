<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Atournayre\Bundle\EntitiesEventsBundle\Dispatcher\EntityEventDispatcher;
use Atournayre\Bundle\EntitiesEventsBundle\Service\EntityManagerService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostPersistService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostRemoveService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostUpdateService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PrePersistService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PreRemoveService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PreUpdateService;
use Doctrine\ORM\EntityManagerInterface;

return static function (ContainerConfigurator $container) {
    $services = $container->services()
        ->defaults()->private();

    $services
        ->set(EntityEventDispatcher::class)
            ->arg(0, service('event_dispatcher'))
            ->arg(1, service('logger'))

        ->set(EntityManagerService::class)
            ->arg(0, service(EntityManagerInterface::class))

        ->set(PrePersistService::class)->public()
            ->arg(0, service('event_dispatcher'))

        ->set(PreUpdateService::class)->public()
            ->arg(0, service('event_dispatcher'))

        ->set(PreRemoveService::class)->public()
            ->arg(0, service('event_dispatcher'))

        ->set(PostPersistService::class)->public()
            ->arg(0, service('event_dispatcher'))
            ->arg(1, service('doctrine'))

        ->set(PostUpdateService::class)->public()
            ->arg(0, service('event_dispatcher'))
            ->arg(1, service('doctrine'))

        ->set(PostRemoveService::class)->public()
            ->arg(0, service('event_dispatcher'))
            ->arg(1, service('doctrine'))

    ;
};
