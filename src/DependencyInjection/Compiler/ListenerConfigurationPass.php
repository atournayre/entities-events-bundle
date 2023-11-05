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
        $this->removeListenerDefinitions($container);
    }

    private function removeListenerDefinitions(ContainerBuilder $container): void
    {
        $listeners = [
            PrePersistListener::class => $container->getParameter('atournayre_entities_events.enable_pre_persist_listener'),
            PreUpdateListener::class => $container->getParameter('atournayre_entities_events.enable_pre_update_listener'),
            PreRemoveListener::class => $container->getParameter('atournayre_entities_events.enable_pre_remove_listener'),
            PostPersistListener::class => $container->getParameter('atournayre_entities_events.enable_post_persist_listener'),
            PostUpdateListener::class => $container->getParameter('atournayre_entities_events.enable_post_update_listener'),
            PostRemoveListener::class => $container->getParameter('atournayre_entities_events.enable_post_remove_listener'),
        ];

        $definitionsToRemove = array_keys(array_filter($listeners));

        foreach ($definitionsToRemove as $definitionToRemove) {
            $container->removeDefinition($definitionToRemove);
        }
    }
}
