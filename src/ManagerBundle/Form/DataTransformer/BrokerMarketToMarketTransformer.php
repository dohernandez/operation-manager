<?php

namespace ManagerBundle\Form\DataTransformer;

use Doctrine\Common\Collections\ArrayCollection;
use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\BrokerMarket;
use ManagerBundle\Entity\StockMarket;
use ManagerBundle\Repository\BrokerMarketRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class BrokerMarketToMarketTransformer implements DataTransformerInterface
{
    /**
     * @var Broker
     */
    protected $broker;

    /**
     * @var BrokerMarketRepository
     */
    private $repository;

    /**
     * @param BrokerMarketRepository $repository
     */
    public function __construct(BrokerMarketRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Transforms a value from the original representation to a transformed representation.
     *
     * This method is called on two occasions inside a form field:
     *
     * 1. When the form field is initialized with the data attached from the datasource (object or array).
     * 2. When data from a request is submitted using {@link Form::submit()} to transform the new input data
     *    back into the renderable format. For example if you have a date field and submit '2009-10-10'
     *    you might accept this value because its easily parsed, but the transformer still writes back
     *    "2009/10/10" onto the form field (for further displaying or other purposes).
     *
     * This method must be able to deal with empty values. Usually this will
     * be NULL, but depending on your implementation other empty values are
     * possible as well (such as empty strings). The reasoning behind this is
     * that value transformers must be chainable. If the transform() method
     * of the first value transformer outputs NULL, the second value transformer
     * must be able to process that value.
     *
     * By convention, transform() should return an empty string if NULL is
     * passed.
     *
     * @param mixed $value The value in the original representation
     *
     * @return mixed The value in the transformed representation
     *
     * @throws TransformationFailedException when the transformation fails
     */
    public function transform($value)
    {
        $markets = new ArrayCollection();

        if (!empty($value)) {
            /** @var BrokerMarket $item */
            foreach ($value as $item) {
                $markets->add($item->getMarket());
            }
        }

        return $markets;
    }

    /**
     * Transforms a value from the transformed representation to its original
     * representation.
     *
     * This method is called when {@link Form::submit()} is called to transform the requests tainted data
     * into an acceptable format for your data processing/model layer.
     *
     * This method must be able to deal with empty values. Usually this will
     * be an empty string, but depending on your implementation other empty
     * values are possible as well (such as NULL). The reasoning behind
     * this is that value transformers must be chainable. If the
     * reverseTransform() method of the first value transformer outputs an
     * empty string, the second value transformer must be able to process that
     * value.
     *
     * By convention, reverseTransform() should return NULL if an empty string
     * is passed.
     *
     * @param mixed $value The value in the transformed representation
     *
     * @return mixed The value in the original representation
     *
     * @throws TransformationFailedException when the transformation fails
     */
    public function reverseTransform($value)
    {
        $markets = new ArrayCollection();
        $brokerMarkets = $this->broker ? $this->repository->findAllByBroker($this->broker) : [];

        if (!empty($value)) {
            /** @var StockMarket $item */
            foreach ($value as $item) {
                $market = null;

                /** @var BrokerMarket $brokerMarket */
                foreach ($brokerMarkets as $brokerMarket) {
                    if ($brokerMarket->isThisMarket($item)) {
                        $market = $brokerMarket;

                        break;
                    }
                }

                if (!$market) {
                    $market = BrokerMarket::createFrom($this->broker, $item);
                }

                $markets->add($market);
            }
        }

        return $markets;
    }

    public function setBroker(Broker $broker)
    {
        $this->broker = $broker;

        return $this;
    }
}
