<?php

namespace ManagerBundle\Form;

use ManagerBundle\Entity\Market;
use ManagerBundle\Entity\Stock;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StockType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('market', EntityType::class, [
                'class'   => Market::class,
                'choice_label' => 'alias',
                'placeholder' => 'Choose market',
            ])->add('symbol', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter symbol',
            ],
        ])
            ->add('alias', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter alias',
                ],
                'required' => false,
            ])
            ->add('company', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter company',
                ],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'rows' => '6',
                    'placeholder' => 'Enter description',
                ],
            ]);

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();

                if (empty($data['alias'])) {
                    $data['alias'] = $data['symbol'];
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
            'data_class' => Stock::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_stock';
    }


}
