<?php

declare(strict_types=1);

namespace PagoFacil\Test\Gateway\Card\Application\Create;

use Monolog\Handler\StreamHandler;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\CommandRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use PagoFacil\Test\Gateway\Card\Application\Create\TransactionDataProvider;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class CreateTransactionTest extends TransactionDataProvider
{
    /** @var QueryRepository $queryRepository */
    protected $queryRepository;
    /** @var CommandRepository $commandRepository */
    protected $commandRepository;

    public function setUp(): void
    {
        $this->logger = new Logger('test');
        $this->logger->pushHandler(new StreamHandler('php://stderr'));
        $this->queryRepository = $this->createMock(QueryRepository::class);
        $this->commandRepository = $this->createMock(CommandRepository::class);
        $this->createDomainModels();
    }

    /**
     * @test
     */
    public function instanceOfValidate()
    {
        $this->assertTrue($this->queryRepository instanceof QueryRepository);
        $this->assertTrue($this->commandRepository instanceof CommandRepository);
        $this->assertTrue($this->logger instanceof LoggerInterface);
    }

    /**
     * @test
     * @dataProvider transactionProvider
     * @param $dataTransaction
     */
    public function sendTransaction($dataTransaction)
    {
        $this->assertIsArray($dataTransaction);
    }
}