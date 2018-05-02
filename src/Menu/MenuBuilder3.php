<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder3 extends MenuBuilder
{

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('mainmenu');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $this->loadServices($menu, $this->factory, self::MAIN_MENU);
        foreach ($menu as $child) {
            if ($child->hasChildren()) {
                $child->setAttribute('class', 'menu-dropdown classic-menu-dropdown');
                $child->setAttribute('aria-haspopup', 'true');
                $child->setChildrenAttribute('class', 'dropdown-menu');
                $this->addSubmenu($child);
            }
        }

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param ItemInterface $item
     */
    public function addSubmenu(ItemInterface $item)
    {
        foreach ($item as $child) {
            $item->setAttribute('aria-haspopup', 'true');

            if ($child->hasChildren()) {
                $child->setAttribute('class', 'dropdown-submenu');
                $child->setChildrenAttribute('class', 'dropdown-menu');
                $this->addSubmenu($child);
            }
        }
    }
}
