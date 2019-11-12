<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Create;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Closure;
use GuzzleHttp\Psr7\Response;
use League\Fractal\Resource\ResourceInterface;
use PagoFacil\Gateway\Gateway\Card\Application\Interfaces\CardServiceInterface;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\SerializerAggregate;
use PagoFacil\Gateway\Shared\Domain\Transaction;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\CommandRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class CreateTransaction
 * @package PagoFacil\Gateway\Card\Application\Create
 */
class CreateTransaction implements CardServiceInterface
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
    private $serializerAggregate = null;
    /** @var ResponseInterface $response */
    private $response = null;
    /**
     * @var Transaction $transaction
     */
    private $transaction;

    /**
     * CreateTransaction constructor.
     * @param ClientInterface $client
     * @param LoggerInterface $logger
     * @param QueryRepository $queryRepository
     * @param CommandRepository $commandRepository
     * @param SerializerAggregate $serializerAggregate
     * @param Transaction $transaction
     */
    public function __construct(
        ClientInterface $client,
        LoggerInterface $logger,
        QueryRepository $queryRepository,
        CommandRepository $commandRepository,
        SerializerAggregate $serializerAggregate,
        Transaction $transaction
    ) {
        $this->client = $client;
        $this->logger = $logger;
        $this->queryRepository = $queryRepository;
        $this->commandRepository = $commandRepository;
        $this->serializerAggregate = $serializerAggregate;
        $this->transaction = $transaction;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendTransaction(): ResponseInterface
    {
        $this->response = $this->client->request(
            'POST',
            $this->transaction->getUserClient()->getEndPoint()->getEndpointTransaction(),
            [
                'query' => urldecode(http_build_query($this->serializerAggregate->getArrayData()))
            ]);

        return $this->response;
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function sendTransactionCURL(Closure $closure): ResponseInterface
    {
        $curl = curl_init();
        $url = "{$this->transaction->getUserClient()->getEndPoint()->getUrl()}{$this->transaction->getUserClient()->getEndPoint()->getEndpointTransaction()}";

        $this->logger->info('datos', $this->serializerAggregate->getArrayData());
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>urldecode(http_build_query($this->serializerAggregate->getArrayData())),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception($err);
        }

        $response = new Response();

        return $response;
    }

    protected function createResource(): ResourceInterface
    {
    }

    public function sendTransactionWithCURL(Closure $closure ): ResponseInterface
    {
        return new Response();
    }
}
