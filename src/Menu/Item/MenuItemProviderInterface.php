<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\Menu\Item;

use Knp\Menu\ItemInterface;
use Knp\Menu\FactoryInterface;

interface MenuItemProviderInterface
{
    /**
     * Posible values of the option notificationType.
     */
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const DANGER = 'danger';
    public const INFO = 'info';

    /**
     * @param ItemInterface    $menu
     * @param FactoryInterface $factory
     * @param string           $typeMenu
     *
     * @return ItemInterface
     */
    public function addItems(ItemInterface $menu, FactoryInterface $factory, string $typeMenu): ItemInterface;
}
