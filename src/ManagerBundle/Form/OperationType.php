<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\BrokerMarket;
use ManagerBundle\Entity\Cryptocurrency;
use ManagerBundle\Entity\CryptocurrencyMarket;
use ManagerBundle\Entity\Operation;
use ManagerBundle\Entity\Product;
use ManagerBundle\Entity\Stock;
use ManagerBundle\Repository\BrokerMarketRepository;
use ManagerBundle\Repository\BrokerRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('valor', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter valor',
                ],
        ])
            ->add('open', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter open',
                ],
            ])
            ->add('goal', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter goal',
                ],
            ])
            ->add('stop', TextType::class, [
                'label' => 'Stop loss',
                'attr' => [
                    'placeholder'  => 'Enter open',
                ],
            ])
            ->add('size', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter size',
                ],
            ])
            ->add('ratio', TextType::class, [
                'label' => 'Benefits / Risk',
                'attr' => [
                    'class'  => 'hide',
                ],
            ])
            ->add('breakeven', TextType::class, [
                'attr' => [
                    'class'  => 'hide',
                ],
            ])
            ->add('openedAt', HiddenType::class)
            ->add('order', HiddenType::class)
            ->add('invested', HiddenType::class)
            ->add('risk', HiddenType::class)
            ->add('breakeven', HiddenType::class)
            ->add('earnings', HiddenType::class)
            ->add('benefits', HiddenType::class)
            ->add('commissions', HiddenType::class)
            ->add('trades', CollectionType::class, [
                'entry_type'     => TradeType::class,
                'entry_options'  => array('label' => false),
                'label'          => false,
                'allow_add'      => true,
                'allow_delete'   => true,
                'by_reference'   => false,
                'error_bubbling' => false,
                'prototype'      => true,
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Operation::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_operation';
    }
}
