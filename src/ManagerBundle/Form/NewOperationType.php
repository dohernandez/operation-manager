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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewOperationType extends AbstractType
{
    /**
     * @var array
     */
    private $operationTypes;

    /**
     * @var BrokerRepository
     */
    private $brokerRepository;

    /**
     * @var BrokerMarketRepository
     */
    private $brokerMarketRepository;

    /**
     * @param array $operationTypes
     * @param BrokerRepository $brokerRepository
     * @param BrokerMarketRepository $brokerMarketRepository
     */
    public function __construct(
        array $operationTypes,
        BrokerRepository $brokerRepository,
        BrokerMarketRepository $brokerMarketRepository
    ) {
        $this->operationTypes = $operationTypes;
        $this->brokerRepository = $brokerRepository;
        $this->brokerMarketRepository = $brokerMarketRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', ChoiceType::class, [
            'choices' => $this->operationTypes,
            'placeholder' => 'Choose type',
            'choice_label' => function ($value, $key, $index) {
                return ucfirst($value);
            },
        ])
            ->add('broker', EntityType::class, [
                'class' => Broker::class,
                'placeholder'  => 'Choose broker',
            ])
            ->add('market', EntityType::class, [
                'class' => BrokerMarket::class,
                'placeholder'  => 'Choose market',
                'choices' => [],
            ])
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'placeholder'  => 'Choose product',
                'choices' => []
            ])
            ->add('valor', TextType::class, [
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
            ]);


        // Modifiers
        $formMarketModifier = function (FormInterface $form, Broker $broker = null) {
            if (null !== $broker) {
                $form->add('market', EntityType::class, [
                    'class' => BrokerMarket::class,
                    'placeholder' => 'Choose market',
                    'choices' => $broker->getMarkets(),
                ]);
            }
        };

        $formProductModifier = function (FormInterface $form, BrokerMarket $brokerMarket = null) {
            if (null !== $brokerMarket) {
                $market = $brokerMarket->getMarket();
                if ($market instanceof CryptocurrencyMarket) {
                    $products = $market->getCryptocurrencies();
                    $class = Cryptocurrency::class;
                } else {
                    $products = $market->getStocks();
                    $class = Stock::class;
                }

                $form->add('product', EntityType::class, array(
                    'class' => $class,
                    'placeholder' => 'Choose product',
                    'choices' => $products,
                    'choice_label' => function ($value, $key, $index) use ($brokerMarket) {
                        if ($brokerMarket->getMarket() instanceof CryptocurrencyMarket) {
                            return $value->getSymbol();
                        } else {
                            return sprintf('%s:%s', $brokerMarket->getMarket()->getAlias(), $value->getSymbol());
                        }
                    },
                ));
            }
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formMarketModifier, $formProductModifier) {
                /** @var Operation $operation */
                $operation = $event->getData();

                $formMarketModifier($event->getForm(), $operation->getBroker());
                $formProductModifier($event->getForm(), $operation->getMarket());
            }
        );

        $brokerRepository = $this->brokerRepository;
        $brokerMarketRepository = $this->brokerMarketRepository;

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) use (
                $formMarketModifier,
                $brokerRepository,
                $formProductModifier,
                $brokerMarketRepository
            ) {
                $data = $event->getData();

                if(array_key_exists('broker', $data) && $data['broker']) {
                    $broker = $brokerRepository->findOneBy(['id' => $data['broker']]);
                    $formMarketModifier($event->getForm(), $broker);
                }

                if(array_key_exists('market', $data) && $data['market']) {
                    $market = $brokerMarketRepository->findOneBy(['id' => $data['market']]);
                    $formProductModifier($event->getForm(), $market);
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
