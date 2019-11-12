<?php

declare(strict_types=1);

namespace PagoFacil\Test\Gateway\Card\Application\Serializers;

use League\Fractal\Manager;
use League\Fractal\Serializer\ArraySerializer;
use PagoFacil\Gateway\Gateway\Card\Application\Serializers\RequestTransactionSerializer as RequestTransaction;
use PagoFacil\Gateway\Gateway\Card\Application\Transformers\RequestTransformer;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Test\Gateway\Card\Application\Create\TransactionDataProvider;


class RequestTransactionSerializerTest extends TransactionDataProvider
{
    /** @var RequestTransaction $request  */
    protected $request;
    /** @var AggregateRoot */
    protected $aggregateRoot;

    public function setUp(): void
    {
        $this->createDomainModels();
        $this->request = new RequestTransaction(new Manager(), new ArraySerializer());
        $this->request->addItem($this->getTransactionModel(), new RequestTransformer());
    }

    /**
     * @test
     */
    public function dataTransformer()
    {
        $this->assertTrue($this->getTransactionModel() instanceof AggregateRoot);
        $this->assertIsArray($this->request->getArrayData());
        $this->assertCount(2, $this->request->getArrayData());
        $this->assertArrayHasKey('method', $this->request->getArrayData());
        $this->assertArrayHasKey('data', $this->request->getArrayData());
    }
}