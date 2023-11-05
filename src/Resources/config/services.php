<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
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
        ->set(EntityManagerService::class)->public()
            ->arg(0, service(EntityManagerInterface::class))

        ->set(EntityEventDispatcher::class)->public()
            ->arg(0, service('event_dispatcher'))
            ->arg(1, service('logger'))
        ->alias(EntityEventDispatcherInterface::class, EntityEventDispatcher::class)

       ->set(PrePersistService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))

        ->set(PreUpdateService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))

        ->set(PreRemoveService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))

        ->set(PostPersistService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))
            ->arg(1, service(EntityManagerService::class))

        ->set(PostUpdateService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))
            ->arg(1, service(EntityManagerService::class))

        ->set(PostRemoveService::class)->public()
            ->arg(0, service(EntityEventDispatcherInterface::class))
            ->arg(1, service(EntityManagerService::class))

    ;
};
