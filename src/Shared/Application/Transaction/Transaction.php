<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Application\Transaction;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\User\Client\Domain\User;
use Psr\Http\Client\ClientInterface;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\TransactionMethod;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Transaction
{
    /** @var ClientInterface $client */
    private $client = null;
    /** @var AggregateRoot $aggregate */
    private $aggregate = null;
    /** @var User $userClientData */
    private $userClientData = null;

    /**
     * Transaction constructor.
     * @param ClientInterface $client
     * @param AggregateRoot $aggregate
     * @param User $user
     */
    public function __construct(ClientInterface $client, AggregateRoot $aggregate, User $user)
    {
        $this->client = $client;
        $this->aggregate = $aggregate;
        $this->userClientData = $user;
    }

    public function transacction(): ResponseInterface
    {
    }

    public function verifyTransaction(): ResponseInterface
    {
    }

    protected function createMethod(): array
    {
    }

    protected function createData(): array
    {
    }
}
