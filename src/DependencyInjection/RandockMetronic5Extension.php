<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\DependencyInjection;

use Randock\Metronic5Bundle\Menu\MenuBuilder10;
use Symfony\Component\Config\FileLocator;
use Randock\Metronic5Bundle\Menu\MenuBuilder1;
use Randock\Metronic5Bundle\Menu\MenuBuilder5;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class RandockMetronic5Extension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('metronic.menu_builder');
        if (1 === $config['layout']) {
            $def->setClass(MenuBuilder1::class);
        } elseif (5 === $config['layout']) {
            $def->setClass(MenuBuilder5::class);
            if (isset($config['menu']) && 10 === $config['menu']) {
                $def->setClass(MenuBuilder10::class);
            }
        }
    }
}
