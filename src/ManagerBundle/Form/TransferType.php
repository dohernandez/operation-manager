<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Account;
use ManagerBundle\Entity\Transfer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TransferType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('transferredAt', DateType::class, [
            'attr' => [
                'placeholder' => 'Enter date',
                'data-date-format' => 'dd/mm/yyyy'
            ],
            'input'  => 'datetime',
            'format' => 'dd/MM/yyyy',
            'label' => 'Date',
            'widget' => 'single_text',
        ])
            ->add('reference', EntityType::class, [
                'class'   => Account::class,
                'placeholder' => 'Choose reference',
            ])
            ->add('beneficiary', EntityType::class, [
                'class'   => Account::class,
                'placeholder' => 'Choose beneficiary',
            ])
            ->add('amount', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter amount',
                ],
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Transfer::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_transfer';
    }


}
