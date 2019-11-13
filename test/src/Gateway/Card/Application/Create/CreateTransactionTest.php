<?php

declare(strict_types=1);

namespace PagoFacil\Test\Gateway\Card\Application\Create;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use League\Fractal\Manager;
use League\Fractal\Serializer\ArraySerializer;
use Monolog\Handler\StreamHandler;
use PagoFacil\Gateway\Gateway\Card\Application\Create\CreateTransaction;
use PagoFacil\Gateway\Gateway\Card\Application\Interfaces\CardServiceInterface;
use PagoFacil\Gateway\Gateway\Card\Application\Serializers\RequestTransactionSerializer as RequestTransaction;
use PagoFacil\Gateway\Gateway\Card\Application\Transformers\RequestTransformer;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\SerializerAggregate;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\CommandRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use PagoFacil\Gateway\Gateway\Card\Application\Exceptions\PagoFacilException;
use Monolog\Logger;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Exception;

class CreateTransactionTest extends TransactionDataProvider
{
    /** @var QueryRepository $queryRepository */
    protected $queryRepository;
    /** @var CommandRepository $commandRepository */
    protected $commandRepository;
    /** @var Client $clientPSR7  */
    protected $clientPSR7;
    /** @var RequestTransaction $request  */
    protected $request;
    /** @var ResponseInterface $response  */
    protected $response;
    /** @var CardServiceInterface */
    protected $useCase;
    /** @var CardServiceInterface */
    protected $useCaseFail;
    /** @var array $responseContent  */
    protected $responseContent;

    public function setUp(): void
    {
        $this->logger = new Logger('test');
        $this->logger->pushHandler(new StreamHandler('php://stderr'));
        $this->queryRepository = $this->createMock(QueryRepository::class);
        $this->commandRepository = $this->createMock(CommandRepository::class);
        $this->createDomainModels();
        $this->clientPSR7 = new Client([
            'base_uri' => $this->client->getEndPoint()->getUrl(),
            'timeout' => 2.0
        ]);
        $this->request = new RequestTransaction(new Manager(), new ArraySerializer());
        $this->request->addItem($this->getTransactionModel(), new RequestTransformer());
        $this->useCase = $this->createService();
        $this->useCaseFail = $this->createBadService();
    }

    protected function createService(): CardServiceInterface
    {
        /** @var CreateTransaction $useCase */
        $useCase = null;
        try {
            $useCase = new CreateTransaction(
                $this->clientPSR7,
                $this->logger,
                $this->queryRepository,
                $this->commandRepository,
                $this->request,
                $this->getTransactionModel()
            );
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->logger->error($exception->getTraceAsString());
        }

        return $useCase;
    }

    protected function createBadService(): CardServiceInterface
    {
        /** @var CreateTransaction $useCase */
        $useCase = null;
        try {
            $useCase = new CreateTransaction(
                $this->clientPSR7,
                $this->logger,
                $this->queryRepository,
                $this->commandRepository,
                $this->request,
                $this->getFakeTransactionModel()
            );
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->logger->error($exception->getTraceAsString());
        }

        return $useCase;
    }

    /**
     * @test
     */
    public function instanceOfValidate()
    {
        $this->assertInstanceOf(QueryRepository::class, $this->queryRepository);
        $this->assertInstanceOf(CommandRepository::class, $this->commandRepository);
        $this->assertInstanceOf(Logger::class, $this->logger);
        $this->assertInstanceOf(Client::class, $this->clientPSR7);
        $this->assertInstanceOf(SerializerAggregate::class, $this->request);
        $this->assertInstanceOf(AggregateRoot::class, $this->getTransactionModel());
        $this->assertInstanceOf(CardServiceInterface::class, $this->useCase);
    }

    /**
     * @test
     * @depends instanceOfValidate
     */
    public function sendTransaction()
    {
        try {
            $this->response = $this->useCase->sendTransaction();
        } catch (GuzzleException | Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->logger->error($exception->getTraceAsString());
        }

        $this->assertInstanceOf(ResponseInterface::class, $this->response);
        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertIsArray($this->response->getHeaders());
        $this->assertInstanceOf(StreamInterface::class, $this->response->getBody());

        $this->responseContent = json_decode($this->response->getBody()->getContents(), true);

        $this->assertIsArray($this->responseContent);
        $this->assertArrayHasKey('WebServices_Transacciones', $this->responseContent);
        //$this->assertEquals(1,$this->responseContent['WebServices_Transacciones']['transaccion']['autorizado']);
    }

    /**
     * @test
     * @depends instanceOfValidate
     */
    public function failTransaction()
    {
        $this->expectException(PagoFacilException::class);

        try {
            $this->response = $this->useCaseFail->sendTransaction();
        } catch (GuzzleException | Exception $exception) {
            $this->logger->error($exception->getMessage());
            $this->logger->error($exception->getTraceAsString());
        }

        $this->assertInstanceOf(ResponseInterface::class, $this->response);
        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertIsArray($this->response->getHeaders());
        $this->assertInstanceOf(StreamInterface::class, $this->response->getBody());

        $this->useCaseFail->validateResponse();
    }
}
