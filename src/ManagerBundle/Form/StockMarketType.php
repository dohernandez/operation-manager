<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Stock;
use ManagerBundle\Entity\StockMarket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockMarketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stocks', EntityType::class, [
            'class' => Stock::class,
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
            'data_class' => StockMarket::class
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
