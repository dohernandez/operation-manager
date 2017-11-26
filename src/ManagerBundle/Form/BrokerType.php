<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\Market;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrokerType extends AbstractType
{
    /**
     * @var array
     */
    private $brokerTypes;

    /**
     * @param array $brokerTypes
     */
    public function __construct(array $brokerTypes)
    {
        $this->brokerTypes = $brokerTypes;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter name',
            ],
        ]);

        $brokerTypes = $this->brokerTypes;

        // the rest of the form is build into the FormEvents::PRE_SET_DATA due we want to disable the choice type
        // when the broker exists.
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($brokerTypes) {
                $disabled = false;

                /** @var Broker $broker */
                $broker = $event->getData();
                if (!empty($broker->getId())) {
                    $disabled = true;
                }

                $form = $event->getForm();

                $form->add('type', ChoiceType::class, [
                    'choices'      => $brokerTypes,
                    'placeholder'  => 'Choose type',
                    'choice_label' => function ($value, $key, $index) {
                        return ucfirst($value);
                        // or if you want to translate some key
                        //return 'form.choice.'.$key;
                    },
                    'disabled'     => $disabled,
                ])->add('account', AccountType::class, [
                    'label' => false,
                ]);

                if ($broker->getType() != 'cryptocurrencies') {
                    $form->add('markets', EntityType::class, [
                        'class'   => Market::class,
                        'choice_label' => 'alias',
                        'placeholder' => 'Choose a market',
                        'multiple' => true,
                        'group_by' => 'region',
                        'attr' => [
                            'class' => 'select2 select2-multiple'
                        ]
                    ]);
                }
            }
        );

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
