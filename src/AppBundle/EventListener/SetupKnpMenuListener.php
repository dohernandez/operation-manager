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

        // Manager
        $managerItem = $menu->getChild('ManagerMenuItem');
        // Manager > Operation Types
        $this->addChildToParent($managerItem, [
            'menu_item' => 'OperationTypesMenuItem',
            'label' => 'Operation types',
            'route' => 'operationtypes_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-line-chart',
        ]);
        // Manager > Action Types
        $this->addChildToParent($managerItem, [
            'menu_item' => 'ActionTypesMenuItem',
            'label' => 'Action types',
            'route' => 'actiontypes_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bell',
        ]);
        // Manager > Market
        $this->addChildToParent($managerItem, [
            'menu_item' => 'MarketMenuItem',
            'label' => 'Markets',
            'route' => 'markets_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-industry',
        ]);
        // Manager > Market
        $this->addChildToParent($managerItem, [
            'menu_item' => 'StockMenuItem',
            'label' => 'Stocks',
            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
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
