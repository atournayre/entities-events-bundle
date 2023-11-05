<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\DependencyInjection\Compiler;

use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostPersistListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostRemoveListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PostUpdateListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PrePersistListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PreRemoveListener;
use Atournayre\Bundle\EntitiesEventsBundle\Listener\PreUpdateListener;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ListenerConfigurationPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container): void
    {
        if (false === $container->getParameter('atournayre_entities_events.enable_pre_persist_listener')) {
            $container->removeDefinition(PrePersistListener::class);
        }

        if (false === $container->getParameter('atournayre_entities_events.enable_pre_update_listener')) {
            $container->removeDefinition(PreUpdateListener::class);
        }

        if (false === $container->getParameter('atournayre_entities_events.enable_pre_remove_listener')) {
            $container->removeDefinition(PreRemoveListener::class);
        }

        if (false === $container->getParameter('atournayre_entities_events.enable_post_persist_listener')) {
            $container->removeDefinition(PostPersistListener::class);
        }

        if (false === $container->getParameter('atournayre_entities_events.enable_post_update_listener')) {
            $container->removeDefinition(PostUpdateListener::class);
        }

        if (false === $container->getParameter('atournayre_entities_events.enable_post_remove_listener')) {
            $container->removeDefinition(PostRemoveListener::class);
        }
    }
}
