<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class EventsExtension extends Extension
{
    public const ALIAS = 'atournayre_entities_events';

    public function getAlias(): string
    {
        return self::ALIAS;
    }

    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new PhpFileLoader($container, new FileLocator(\dirname(__DIR__).'/Resources/config'));
        $loader->load('services.php');

        $container->setParameter('atournayre_entities_events.enable_pre_persist_listener', $config['enable_pre_persist_listener']);
        $container->setParameter('atournayre_entities_events.enable_pre_update_listener', $config['enable_pre_update_listener']);
        $container->setParameter('atournayre_entities_events.enable_pre_remove_listener', $config['enable_pre_remove_listener']);
        $container->setParameter('atournayre_entities_events.enable_post_persist_listener', $config['enable_post_persist_listener']);
        $container->setParameter('atournayre_entities_events.enable_post_update_listener', $config['enable_post_update_listener']);
        $container->setParameter('atournayre_entities_events.enable_post_remove_listener', $config['enable_post_remove_listener']);
    }
}
