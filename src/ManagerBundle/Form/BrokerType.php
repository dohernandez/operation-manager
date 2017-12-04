<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\CryptocurrencyMarket;
use ManagerBundle\Entity\Market;
use ManagerBundle\Entity\StockMarket;
use ManagerBundle\Form\DataTransformer\BrokerMarketToMarketTransformer;
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
     * @var BrokerMarketToMarketTransformer
     */
    private $marketsTransformer;

    /**
     * @param array $brokerTypes
     * @param BrokerMarketToMarketTransformer $marketsTransformer
     */
    public function __construct(array $brokerTypes, BrokerMarketToMarketTransformer $marketsTransformer)
    {
        $this->brokerTypes = $brokerTypes;
        $this->marketsTransformer = $marketsTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var Broker $broker */
        $broker = $options['data'];
        $this->marketsTransformer->setBroker($broker);

        $disabled = false;

        if (!empty($broker->getId())) {
            $disabled = true;
        }

        $marketOptions = [
            'choice_label' => 'alias',
            'multiple' => true,
            'group_by' => 'region',
            'attr' => [
                'class' => 'select2 select2-multiple',
                'style' => 'width: 100%',
            ],
            'by_reference'   => false,
        ];

        $builder->add('name', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter name',
            ],
        ])
            ->add('type', ChoiceType::class, [
                'choices'      => $this->brokerTypes,
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

        if (!empty($broker->getType())) {
            $entityClass = StockMarket::class;

            if ($broker->getType() == 'cryptocurrencies') {
                $entityClass = CryptocurrencyMarket::class;
            }

            $builder->add('markets', BrokerMarketEntityType::class, [
                'class'   => $entityClass,
            ] + $marketOptions);
        } else {
            $builder->add('markets', BrokerMarketEntityType::class, [
                'class'   => Market::class,
                'choices' => []
            ] + $marketOptions);

            $builder->get('type')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) use ($marketOptions) {
                    $type = $event->getForm()->getData();
                    $form = $event->getForm()->getParent();

                    if (!empty($type)) {
                        $entityClass = StockMarket::class;

                        if ($type == 'cryptocurrencies') {
                            $entityClass = CryptocurrencyMarket::class;
                        }

                        $form->add('markets', BrokerMarketEntityType::class, [
                            'class'   => $entityClass,
                        ] + $marketOptions);
                    }
                }
            );
        }

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
