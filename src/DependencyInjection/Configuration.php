<?php

namespace Randock\Metronic5Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('randock_metronic5');

        $rootNode
            ->children()
            ->enumNode('layout')->values([1,3])->isRequired()->end()
            ->end()
            ;

        return $treeBuilder;
    }
}
