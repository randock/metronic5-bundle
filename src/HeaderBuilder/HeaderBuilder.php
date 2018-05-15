<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder;

use Symfony\Component\DependencyInjection\Container;

class HeaderBuilder
{
    /**
     * @var array
     */
    private $services;

    /**
     * @var Container
     */
    private $container;

    /**
     * HeaderBuilder constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $services
     *
     * @return HeaderBuilder
     */
    public function setServices(array $services): self
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return array
     */
    public function getServices(): array
    {
        $services = [];
        foreach ($this->services as $service) {
            $services[] = $this->container->get($service);
        }

        return $services;
    }
}
