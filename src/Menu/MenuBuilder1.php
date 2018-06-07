<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder1 extends MenuBuilder
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
        $menu->setChildrenAttribute('class', 'm-menu__nav  m-menu__nav--dropdown-submenu-arrow');

        $this->loadServices($menu, $this->factory, self::MAIN_MENU);
        $this->addSubmenu($menu);

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param ItemInterface $item
     */
    public function addSubmenu(ItemInterface $item)
    {
        foreach ($item as $child) {
            $child->setAttribute('class', 'm-menu__item m-menu__item--submenu');
            if ($child->hasChildren()) {
                $child->setLinkAttribute('class', 'm-menu__link m-menu__toggle');
                $child->setAttribute('aria-haspopup', 'true');
                $child->setAttribute('m-menu-submenu-toggle', 'hover');
                $child->setChildrenAttribute('class', 'm-menu__subnav');
                $this->addSubmenu($child);
            } else {
                $child->setLinkAttribute('class', 'm-menu__link');
            }
        }
    }

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createTopMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('topmenu');
        $menu->setChildrenAttribute('class', 'm-nav m-nav--skin-light');
        $this->loadServices($menu, $this->factory, self::TOP_MENU);
        $this->setTopMenuItemsClasses($menu);

        $this->reorderMenuItems($menu);

        return $menu;
    }

    public function setTopMenuItemsClasses(ItemInterface $item)
    {
        /** @var ItemInterface $child */
        foreach ($item as $child) {
            if (null === $child->getLinkAttribute('class')) {
                $child->setLinkAttribute('class', 'm-nav__link');
            }
        }
    }
}
