<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Country;
use ManagerBundle\Entity\Market;
use ManagerBundle\Entity\Region;
use Symfony\Component\Form\FormInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarketType extends AbstractType
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
            ->add('alias', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter alias',
                ],
                'required' => false,
            ])
            ->add('symbol', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter symbol',
                ],
            ])
            ->add('region', EntityType::class, [
                'class'   => Region::class,
                'placeholder' => 'Choose region',
            ])
            ->add('country', EntityType::class, array(
                'class' => Country::class,
                'placeholder' => 'Choose country',
                'choices' => [],
            ));

        $formModifier = function (FormInterface $form, Region $region = null) {
            $counties = null === $region ? array() : $region->getCountries();

            $form->add('country', EntityType::class, array(
                'class' => Country::class,
                'placeholder' => 'Choose country',
                'choices' => $counties,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                /** @var Market $market */
                $market = $event->getData();

                $formModifier($event->getForm(), $market->getRegion());
            }
        );

        $builder->get('region')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                /** @var Region $region */
                $region = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $region);
            }
        );


        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();

                if (empty($data['alias'])) {
                    $data['alias'] = $data['name'];
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
            'data_class' => Market::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_market';
    }
}
