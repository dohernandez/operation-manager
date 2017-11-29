<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\CryptocurrencyMarket;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CryptocurrencyMarketType extends MarketType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CryptocurrencyMarket::class
        ));
    }
}
