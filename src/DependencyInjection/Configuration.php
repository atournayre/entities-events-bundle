<?php

namespace Atournayre\Bundle\EntitiesEventsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder =  new TreeBuilder('atournayre_entities_events');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->booleanNode('enable_pre_persist_listener')->defaultTrue()->end()
                ->booleanNode('enable_pre_update_listener')->defaultTrue()->end()
                ->booleanNode('enable_pre_remove_listener')->defaultTrue()->end()
                ->booleanNode('enable_post_persist_listener')->defaultTrue()->end()
                ->booleanNode('enable_post_update_listener')->defaultTrue()->end()
                ->booleanNode('enable_post_remove_listener')->defaultTrue()->end()
            ->end();

        return $treeBuilder;
    }
}
