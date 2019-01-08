<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('randock_metronic5');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->enumNode('layout')
                    ->values([1, 5])
                    ->isRequired()
                ->end()
                ->enumNode('menu')
                    ->values([1, 5, 10])
                ->end()
            ->end();

        return $treeBuilder;
    }
}
