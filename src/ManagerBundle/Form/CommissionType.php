<?php

namespace ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommissionType extends AbstractType
{
    /**
     * @var array
     */
    private $commissionTypes;

    /**
     * @var array
     */
    private $commissionPeriods;

    /**
     * @var array
     */
    private $commissionAppliedTypes;

    /**
     * @param array $commissionTypes
     * @param array $commissionPeriods
     * @param array $commissionAppliedTypes
     */
    public function __construct(array $commissionTypes, array $commissionPeriods, array $commissionAppliedTypes)
    {
        $this->commissionTypes = $commissionTypes;
        $this->commissionPeriods = $commissionPeriods;
        $this->commissionAppliedTypes = $commissionAppliedTypes;
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
            'label' => false
        ])
            ->add('type', ChoiceType::class, [
                'choices' => $this->commissionTypes,
                'placeholder' => 'Choose type',
                'label' => false,
                'choice_label' => function ($value, $key, $index) {
                    $title = preg_replace('/(.*)_(.*)/', "$1 $2", $value);
                    return ucfirst($title ?: $value);
                    // or if you want to translate some key
                    //return 'form.choice.'.$key;
                },
            ])
            ->add('value', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter value',
                ],
                'label' => false,
                'required' => false,
            ])
            ->add('percentage', CheckboxType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('frequency', ChoiceType::class, [
                'choices' => $this->commissionPeriods,
                'placeholder' => 'Choose frequency',
                'label' => false,
                'choice_label' => function ($value, $key, $index) {
                    $title = preg_replace('/(.*)_(.*)/', "$1 $2", $value);
                    return ucfirst($title ?: $value);
                    // or if you want to translate some key
                    //return 'form.choice.'.$key;
                },
            ])
            ->add('applied', ChoiceType::class, [
                'choices' => $this->commissionAppliedTypes,
                'placeholder' => 'Choose applied',
                'label' => false,
                'choice_label' => function ($value, $key, $index) {
                    $value_without_per = preg_replace('/per_(.*)/', "$1", $value);
                    $title = preg_replace('/(.*)_(.*)/', "$1 $2", $value_without_per);
                    return ucfirst($title ?: $value);
                    // or if you want to translate some key
                    //return 'form.choice.'.$key;
                },
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ManagerBundle\Entity\Commission'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_commissions';
    }
}
