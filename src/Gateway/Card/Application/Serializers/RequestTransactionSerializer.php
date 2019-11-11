<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Serializers;

use League\Fractal\Resource\Item;
use League\Fractal\Resource\ResourceInterface;
use League\Fractal\Manager;
use League\Fractal\Serializer\SerializerAbstract;
use League\Fractal\TransformerAbstract;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\Interfaces\Aggregate;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\SerializerAggregate;

class RequestTransactionSerializer implements SerializerAggregate
{
    /** @var SerializerAbstract $serializer */
    private $serializer = null;
    /** @var Manager $manager  */
    private $manager = null;
    /** @var ResourceInterface $resurce*/
    private $resurce = null;

    /**
     * RequestTransactionSerializer constructor.
     * @param Manager $manager
     * @param SerializerAbstract $serializer
     */
    public function __construct(Manager $manager, SerializerAbstract $serializer)
    {
        $this->manager = $manager;
        $this->serializer = $serializer;

        $this->manager->setSerializer($serializer);
    }

    public function addItem(Aggregate $aggregate, TransformerAbstract $transformer): void
    {
        $this->resurce = new Item($aggregate, $transformer);
    }

    public function getArrayData(): array
    {
        return $this->manager->createData($this->resurce)->toArray();
    }
}
