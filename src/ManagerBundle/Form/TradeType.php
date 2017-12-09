<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Trade;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TradeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tradeAt', DateType::class, [
            'attr' => [
                'placeholder' => 'Enter date',
                'data-date-format' => 'dd/mm/yyyy'
            ],
            'input'  => 'datetime',
            'format' => 'dd/MM/yyyy',
            'label' => 'Date',
            'widget' => 'single_text',
        ])
            ->add('price', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter price',
                ],
            ])
            ->add('order', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter order',
                ],
            ])
            ->add('size', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter size',
                ],
            ])
            ->add('glide', HiddenType::class)
            ->add('commissions', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter commissions',
                ],
            ])
            ->add('expenses', TextType::class, [
                'attr' => [
                    'placeholder'  => 'Enter expenses',
                ],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Trade::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_operation_trade';
    }


}
