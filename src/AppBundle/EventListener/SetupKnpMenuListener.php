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

        // Trading
        $menu = $this->addTradingMenu($menu, $event);
        // Finance
        $menu = $this->addFinanceMenu($menu, $event);
        // Brokers
        $this->addBrokersMenu($menu, $event);
        // Markets
        $this->addMarketsMenu($menu, $event);
        // Products
        $this->addProductsMenu($menu, $event);
    }

    private function addTradingMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $operationItem = $this->addChildToParent($menu, [
            'menu_item' => 'TradingMenuItem',
            'label' => 'Trading',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Operation > Brokers
        $this->addChildToParent($operationItem, [
            'menu_item' => 'TradingOperationMenuItem',
            'label' => 'Operations',
//            'route' => 'brokers_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-desktop',
        ]);

        return $menu;
    }

    private function addFinanceMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $financeItem = $this->addChildToParent($menu, [
            'menu_item' => 'FinanceMenuItem',
            'label' => 'Finance',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Finance > Transfer
        $this->addChildToParent($financeItem, [
            'menu_item' => 'FinanceTransferMenuItem',
            'label' => 'Transfers',
            'route' => 'transfers_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-exchange',
        ]);
        // Finance > Account
        $this->addChildToParent($financeItem, [
            'menu_item' => 'FinanceAccountMenuItem',
            'label' => 'Accounts',
            'route' => 'accounts_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-credit-card',
        ]);

        return $menu;
    }

    /**
     * @param MenuItem $parent
     * @param array $child
     *
     * @return MenuItem
     */
    private function addChildToParent(MenuItem $parent, array $child): MenuItem
    {
        return $parent->addChild($child['menu_item'], [
                'label'        => $child['label'],
                'route'        => $child['route'],
                'childOptions' => $child['child_options']
            ]
        )->setLabelAttribute('icon',  $child['icon']);
    }

    private function addMarketsMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $managerItem = $this->addChildToParent($menu, [
            'menu_item' => 'MarketsMenuItem',
            'label' => 'Markets',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Markets > Stock
        $this->addChildToParent($managerItem, [
            'menu_item' => 'MarketsStockMarketMenuItem',
            'label' => 'Stocks',
//            'route' => 'markets_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-industry',
        ]);
        // Markets > Cryptocurrencies
        $this->addChildToParent($managerItem, [
            'menu_item' => 'MarketsCryptocurrencyMarketMenuItem',
            'label' => 'Cryptocurrencies',
//            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-industry',
        ]);

        return $menu;
    }

    private function addBrokersMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $managerItem = $this->addChildToParent($menu, [
            'menu_item' => 'BrokerMenuItem',
            'label' => 'Brokers',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Brokers > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'BrokersBrokersMenuItem',
            'label' => 'Brokers',
//            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-desktop',
        ]);

        return $menu;
    }

    private function addProductsMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $managerItem = $this->addChildToParent($menu, [
            'menu_item' => 'ProductsMenuItem',
            'label' => 'Products',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Brokers > Stocks
        $this->addChildToParent($managerItem, [
            'menu_item' => 'ProductsStockMenuItem',
            'label' => 'Stocks',
//            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);

        // Brokers > Cryptocurrencies
        $this->addChildToParent($managerItem, [
            'menu_item' => 'ProductsCryptocurrenciesMenuItem',
            'label' => 'Cryptocurrencies',
//            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);

        return $menu;
    }
}
