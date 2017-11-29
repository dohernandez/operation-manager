<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\StockMarket;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockMarketType extends MarketType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => StockMarket::class
        ));
    }
}
