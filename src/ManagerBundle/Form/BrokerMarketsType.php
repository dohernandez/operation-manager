<?php

namespace ManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrokerMarketsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var Broker $broker */
        $broker = $options['data'];
        $entityType = BrokerStockMarketType::class;

        if ($broker->getType() == 'cryptocurrencies') {
            $entityType = BrokerCryptocurrencyMarketType::class;
        }

        $builder->add('markets', CollectionType::class, [
            'entry_type'     => $entityType,
            'entry_options'  => array('label' => false),
            'label'          => false,
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ManagerBundle\Entity\Broker'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'managerbundle_broker';
    }
}
