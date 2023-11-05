<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Atournayre\Bundle\EntitiesEventsBundle\Contracts\EntityEventDispatcherInterface;
use Atournayre\Bundle\EntitiesEventsBundle\Dispatcher\EntityEventDispatcher;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostPersistListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostRemoveListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostUpdateListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PrePersistListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PreRemoveListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PreUpdateListener;
use Atournayre\Bundle\EntitiesEventsBundle\Service\EntityManagerService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostPersistService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostRemoveService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PostUpdateService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PrePersistService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PreRemoveService;
use Atournayre\Bundle\EntitiesEventsBundle\Service\PreUpdateService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

return static function (ContainerConfigurator $container) {
    $DOCTRINE_EVENT_LISTENER_TAG = 'doctrine.event_listener';

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

        ->set(PrePersistListener::class)->public()
            ->arg(0, service(PrePersistService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::prePersist, 'priority' => -128])

        ->set(PreUpdateListener::class)->public()
            ->arg(0, service(PreUpdateService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::preUpdate, 'priority' => -128])

        ->set(PreRemoveListener::class)->public()
            ->arg(0, service(PreRemoveService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::preRemove, 'priority' => -128])

        ->set(PostPersistListener::class)->public()
            ->arg(0, service(PostPersistService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::postPersist, 'priority' => -128])

        ->set(PostUpdateListener::class)->public()
            ->arg(0, service(PostUpdateService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::postUpdate, 'priority' => -128])

        ->set(PostRemoveListener::class)->public()
            ->arg(0, service(PostRemoveService::class))
            ->arg(1, service(ParameterBagInterface::class))
            ->tag($DOCTRINE_EVENT_LISTENER_TAG, ['event' => Events::postRemove, 'priority' => -128])

    ;
};
