<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Randock\Metronic5Bundle\DependencyInjection\Compiler\MenuPass;
use Randock\Metronic5Bundle\DependencyInjection\Compiler\HeaderListPass;

class RandockMetronic5Bundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MenuPass());
        $container->addCompilerPass(new HeaderListPass());
    }
}
