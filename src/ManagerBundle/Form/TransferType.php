<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Account;
use ManagerBundle\Entity\Currency;
use ManagerBundle\Entity\Transfer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ->add('currency', EntityType::class, [
                'class'   => Currency::class,
                'placeholder' => 'Choose currency',
                'choice_name' => 'iso',
            ])
            ->add('amount', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter amount',
                ],
            ])
            // This hidden input will be used only to update the broker in the BrokerListener::onSavedTransfer
            ->add('old_amount', HiddenType::class, [
                'mapped' => false
            ]);

        // Set the old_amount value with the current amount
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $form = $event->getForm();

                $form->get('old_amount')->setData($form->get('amount')->getData());
            }
        );
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
