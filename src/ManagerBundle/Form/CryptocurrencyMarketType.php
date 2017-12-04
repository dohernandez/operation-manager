<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Cryptocurrency;
use ManagerBundle\Entity\CryptocurrencyMarket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CryptocurrencyMarketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cryptocurrencies', EntityType::class, [
            'class' => Cryptocurrency::class,
            'choice_label' => 'symbol',
            'multiple' => true,
            'attr' => [
                'class' => 'select2 select2-multiple',
                'style' => 'width: 100%',
            ],
            'by_reference'   => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => CryptocurrencyMarket::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'ManagerBundle\Form\MarketType';
    }
}
