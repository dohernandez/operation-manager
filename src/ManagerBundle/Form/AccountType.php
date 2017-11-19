<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AccountType extends AbstractType
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
            ->add('iban', TextType::class, [
                'label' => 'IBAN',
                'attr' => [
                    'placeholder' => 'Enter IBAN',
                ],
            ])
            ->add('type', HiddenType::class);

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $data = $event->getData();

                if ($form->getParent() === null || ($form->getParent() && empty($data['type']))) {
                    $data['type'] = 'account';
                    $event->setData($data);
                }
            }
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Account::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_account';
    }


}
