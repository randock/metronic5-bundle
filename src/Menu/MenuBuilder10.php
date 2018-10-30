<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\Menu;

use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder10 extends MenuBuilder
{
    public const TOGGLE_TAB = 'tab';
    public const TOGGLE_HOVER = 'hover';

    /**
     * @param RequestStack $requestStack
     *
     * @return ItemInterface
     */
    public function createMainMenu(RequestStack $requestStack): ItemInterface
    {
        /** @var ItemInterface $menu */
        $menu = $this->factory->createItem('mainmenu');
        $menu->setChildrenAttribute('class', 'm-menu__nav  m-menu__nav--submenu-arrow');
        $this->loadServices($menu, $this->factory, self::MAIN_MENU);
        $this->addSubmenu($menu);

        $this->reorderMenuItems($menu);

        return $menu;
    }

    /**
     * @param ItemInterface $item
     */
    public function addSubmenu(ItemInterface $item, string $submenutoggle = Self::TOGGLE_TAB)
    {
        foreach ($item as $child) {
            $child->setAttribute('aria-haspopup', 'true');
            if (null === $child->getAttribute('class')) {
                $child->setAttribute('class', 'm-menu__item');
            }

            if ($child->hasChildren()) {
                $child->setChildrenAttribute('class', 'm-menu__subnav');
                if (null === $child->getLinkAttribute('class')) {
                    $child->setLinkAttribute('class', 'm-menu__link m-menu__toggle');
                }
                $child->setAttribute('class', 'm-menu__item m-menu__item--submenu m-menu__item--tabs');
                $child->setAttribute('m-menu-submenu-toggle', $submenutoggle);
                $child->setAttribute('aria-haspopup', 'true');
                $this->addSubmenu($child, self::TOGGLE_HOVER);
            } else {
                if (null === $child->getLinkAttribute('class')) {
                    $child->setLinkAttribute('class', 'm-menu__item m-menu__link');
                }
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
