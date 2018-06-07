<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Randock\Metronic5Bundle\HeaderBuilder\HeaderList\Definition\HeaderListInterface;
use Randock\Metronic5Bundle\DependencyInjection\Compiler\Exception\ServiceDoesNotImplementHeaderListInterfaceException;

class HeaderListPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('metronic.header_builder')) {
            return;
        }

        $definition = $container->findDefinition('metronic.header_builder');
        $taggedServices = $container->findTaggedServiceIds('metronic.header_list');

        $sortedServices = [];

        foreach ($taggedServices as $service => $tags) {
            $serviceDefinition = $container->findDefinition($service);
            $reflectionClass = new \ReflectionClass($serviceDefinition->getClass());
            if (!$reflectionClass->implementsInterface(HeaderListInterface::class)) {
                throw new ServiceDoesNotImplementHeaderListInterfaceException($serviceDefinition->getClass());
            }

            $sortedServices[$service] = $tags[0]['priority'] ?? INF;
        }

        asort($sortedServices);

        $definition->addMethodCall('setServices', [array_keys($sortedServices)]);
    }
}
