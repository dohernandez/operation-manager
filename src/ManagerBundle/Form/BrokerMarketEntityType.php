<?php

namespace ManagerBundle\Form;

use ManagerBundle\Form\DataTransformer\BrokerMarketToMarketTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BrokerMarketEntityType extends AbstractType
{
    /**
     * @var BrokerMarketToMarketTransformer
     */
    private $transformer;

    /**
     * @param BrokerMarketToMarketTransformer $transformer
     */
    public function __construct(BrokerMarketToMarketTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer($this->transformer);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'Symfony\Bridge\Doctrine\Form\Type\EntityType';
    }
}
