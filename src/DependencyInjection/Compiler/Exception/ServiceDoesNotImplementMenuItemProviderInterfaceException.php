<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\DependencyInjection\Compiler\Exception;

/**
 * Class ServiceDoesNotImplementMenuItemProviderInterfaceException.
 */
class ServiceDoesNotImplementMenuItemProviderInterfaceException extends \Exception
{
    /**
     * ServiceNotImplementMenuItemProviderInterfaceException constructor.
     *
     * @param string $class
     */
    public function __construct(string $class)
    {
        parent::__construct(sprintf('The %s must implement MenuItemProviderInterface', $class));
    }
}
