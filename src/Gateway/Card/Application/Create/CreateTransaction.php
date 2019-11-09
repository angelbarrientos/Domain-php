<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Card\Application\Create;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use League\Fractal\Resource\ResourceInterface;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\SerializerAggregate;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\CommandRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class CreateTransaction
{
    /** @var ClientInterface $client  */
    private $client = null;
    /** @var LoggerInterface $logger */
    private $logger = null;
    /** @var QueryRepository $queryRepository */
    private $queryRepository = null;
    /** @var CommandRepository $commandRepository  */
    private $commandRepository = null;
    /** @var SerializerAggregate $serializerAggregate */
    private $serializerAggregate;

    /**
     * CreateTransaction constructor.
     * @param ClientInterface $client
     * @param LoggerInterface $logger
     * @param QueryRepository $queryRepository
     * @param CommandRepository $commandRepository
     * @param SerializerAggregate $serializerAggregate
     */
    public function __construct(
        ClientInterface $client,
        LoggerInterface $logger,
        QueryRepository $queryRepository,
        CommandRepository $commandRepository,
        SerializerAggregate $serializerAggregate
    )
    {
        $this->client = $client;
        $this->logger = $logger;
        $this->queryRepository = $queryRepository;
        $this->commandRepository = $commandRepository;
        $this->serializerAggregate = $serializerAggregate;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendTransaction(): ResponseInterface
    {
        return $this->client->request('POST', '/Wstransaccion/format/json?', [
            'form_params' => [
                'method' => '',
                'data' => []
            ]
        ]);
    }

    protected function createResource(): ResourceInterface
    {}
}
