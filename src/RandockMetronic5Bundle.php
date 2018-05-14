<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle;

use Randock\Metronic5Bundle\DependencyInjection\Compiler\HeaderListPass;
use Randock\Metronic5Bundle\DependencyInjection\Compiler\MenuPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RandockMetronic5Bundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MenuPass());
        $container->addCompilerPass(new HeaderListPass());
    }

}
