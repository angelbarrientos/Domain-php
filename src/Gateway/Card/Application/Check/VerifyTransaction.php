<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Check;

use Psr\Log\LoggerInterface;
use GuzzleHttp\ClientInterface;
use League\Fractal\Resource\ResourceInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\CommandRepository;

class VerifyTransaction
{
    /**
     * @var QueryRepository $queryRepository
     */
    private $queryRepository;
    /**
     * @var CommandRepository $commandRepository
     */
    private $commandRepository;
    /**
     * @var ClientInterface $client
     */
    private $client;
    /**
     * @var LoggerInterface $logger
     */
    private $logger;

    /**
     * VerifyTransaction constructor.
     * @param QueryRepository $queryRepository
     * @param CommandRepository $commandRepository
     * @param ClientInterface $client
     * @param LoggerInterface $logger
     */
    public function __construct(
        QueryRepository $queryRepository,
        CommandRepository $commandRepository,
        ClientInterface $client,
        LoggerInterface $logger
    )
    {
        $this->queryRepository = $queryRepository;
        $this->commandRepository = $commandRepository;
        $this->client = $client;
        $this->logger = $logger;
    }
}
