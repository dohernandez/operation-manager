<?php

namespace AppBundle\EventListener;

use Avanzu\AdminThemeBundle\Event\KnpMenuEvent;

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

        // A "regular" menu item with a link
        $menu->addChild('ManagerMenuItem', [
                'route' => 'manager_index',
                'label' => 'Manager',
                'childOptions' => $event->getChildOptions()
            ]
        )->setLabelAttribute('icon', 'fa fa-bars');

        // First child, a regular menu item
        $menu->getChild('ManagerMenuItem')->addChild('OperationTypesMenuItem', [
                'label' => 'Operation types',
                'route' => 'operationtypes_index',
                'childOptions' => $event->getChildOptions()
            ]
        )->setLabelAttribute('icon', 'fa fa-line-chart');
    }
}
