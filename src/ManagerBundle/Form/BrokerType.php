<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Broker;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrokerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter name',
            ],
        ])
            ->add('type', EntityType::class, [
                'class'   => \ManagerBundle\Entity\BrokerType::class,
                'placeholder' => 'Choose type',
            ])
            ->add('account', AccountType::class)
            ->add('commissiontypes', CollectionType::class, [
                'entry_type' => BrokerCommissionsType::class,
                'entry_options' => array('label' => false),
                'label' => false,
            ]);

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();

                $data['account']['type'] = 'broker';
                $event->setData($data);
            }
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Broker::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_broker';
    }
}
