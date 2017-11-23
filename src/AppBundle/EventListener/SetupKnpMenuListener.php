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

        // Operation
        $menu = $this->addOperationMenu($menu, $event);
        // Finance
        $menu = $this->addFinanceMenu($menu, $event);
        // Investor
        $this->addInvestorMenu($menu, $event);
    }

    private function addOperationMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $operationItem = $this->addChildToParent($menu, [
            'menu_item' => 'OperationMenuItem',
            'label' => 'Operation',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Operation > Brokers
        $this->addChildToParent($operationItem, [
            'menu_item' => 'OperationBrokerMenuItem',
            'label' => 'Brokers',
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

    private function addInvestorMenu(MenuItem $menu, KnpMenuEvent $event)
    {
        $managerItem = $this->addChildToParent($menu, [
            'menu_item' => 'InvestorMenuItem',
            'label' => 'Investor',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bars',
        ]);

        // Investor > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'InvestorMarketMenuItem',
            'label' => 'Markets',
            'route' => 'markets_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-industry',
        ]);
        // Investor > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'InvestorStockMenuItem',
            'label' => 'Stocks',
            'route' => 'stocks_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);
        // Investor > Index
        $this->addChildToParent($managerItem, [
            'menu_item' => 'InvestorCryptocurrencyMenuItem',
            'label' => 'Cryptocurrencies',
            'route' => 'cryptocurrencies_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-bar-chart',
        ]);
        // Investor > Broker
        $this->addChildToParent($managerItem, [
            'menu_item' => 'InvestorBrokerMenuItem',
            'label' => 'Brokers',
            'route' => 'brokers_index',
            'child_options' => $event->getChildOptions(),
            'icon' => 'fa fa-desktop',
        ]);

        return $menu;
    }
}
