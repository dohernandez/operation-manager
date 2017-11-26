<?php

namespace ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarketCommissionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('commissions', CollectionType::class, [
            'entry_type'     => CommissionType::class,
            'entry_options'  => array('label' => false),
            'label'          => false,
            'allow_add'      => true,
            'allow_delete'   => true,
            'by_reference'   => false,
            'error_bubbling' => false,
            'prototype'      => true,
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ManagerBundle\Entity\Market'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_market_commission';
    }
}
