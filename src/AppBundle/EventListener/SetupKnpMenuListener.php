<?php

namespace AppBundle\EventListener;

use Avanzu\AdminThemeBundle\Event\KnpMenuEvent;
use Knp\Menu\MenuItem;

class SetupKnpMenuListener
{
    public function onSetupMenu(KnpMenuEvent $event)
    {
        $menu = $event->getMenu();

        // Adds a menu item which acts as a label
        $menu->addChild('MainNavigationMenuItem', [
                'label' => 'MAIN NAVIGATION',
                'childOptions' => $event->getChildOptions()
            ]
        )->setAttribute('class', 'header');

        $this->addChildToParent($menu, [
            'menu_item' => 'ManagerMenuItem',
            'label' => 'Manager',
            'route' => 'manager_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Manager item
        $managerItem = $menu->getChild('ManagerMenuItem');
        $this->addChildToParent($managerItem, [
            'menu_item' => 'OperationTypesMenuItem',
            'label' => 'Operation types',
            'route' => 'operationtypes_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-line-chart',
        ]);
        $this->addChildToParent($managerItem, [
            'menu_item' => 'ActionTypesMenuItem',
            'label' => 'Action types',
            'route' => 'actiontypes_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bell',
        ]);
    }

    /**
     * @param array $child
     */
    protected function addChildToParent(MenuItem $parent, array $child): void
    {
        $parent->addChild($child['menu_item'], [
                'label'        => $child['label'],
                'route'        => $child['route'],
                'childOptions' => $child['child_options']
            ]
        )->setLabelAttribute('icon',  $child['icon']);
    }
}
