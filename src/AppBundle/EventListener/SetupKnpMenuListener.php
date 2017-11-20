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
        // Manager > Transfer
        $this->addChildToParent($managerItem, [
            'menu_item' => 'TransferMenuItem',
            'label' => 'Transfers',
            'route' => 'transfers_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-exchange',
        ]);
        // Manager > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'MarketMenuItem',
            'label' => 'Markets',
            'route' => 'markets_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-industry',
        ]);
        // Manager > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'StockMenuItem',
            'label' => 'Stocks',
            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);
        // Manager > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'CryptocurrencyMenuItem',
            'label' => 'Cryptocurrencies',
            'route' => 'cryptocurrencies_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);
        // Manager > Account
        $this->addChildToParent($managerItem, [
            'menu_item' => 'AccountMenuItem',
            'label' => 'Accounts',
            'route' => 'accounts_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-credit-card',
        ]);
        // Manager > Broker
        $this->addChildToParent($managerItem, [
            'menu_item' => 'BrokerMenuItem',
            'label' => 'Brokers',
            'route' => 'brokers_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-desktop',
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
