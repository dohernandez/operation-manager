<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Stock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrokerMarketStocksType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stocks', EntityType::class, [
            'class' => Stock::class,
            'placeholder'  => 'Choose stock',
            'multiple' => true,
            'required' => false,
            'attr' => [
                'class' => 'select2 select2-multiple',
                'style' => 'width: 100%',
            ],
            'choice_label' => 'alias',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ManagerBundle\Entity\StockMarket'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_broker_market_product';
    }
}
