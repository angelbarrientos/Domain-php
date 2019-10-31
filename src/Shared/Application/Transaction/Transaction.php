<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Application\Transaction;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;
use PagoFacil\Gateway\Shared\Domain\Aggregate\Abstracts\AggregateRoot;
use PagoFacil\Gateway\User\Client\Domain\User;
use Psr\Http\Client\ClientInterface;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\TransactionMethod;
use Psr\Http\Message\{RequestInterface, ResponseInterface};


class Transaction
{
    /** @var ClientInterface $client */
    private $client = null;
    /** @var \PagoFacil\Gateway\Shared\Domain\Transaction $aggregate */
    private $aggregate = null;
    /** @var User $userClientData */
    private $userClientData = null;

    /**
     * Transaction constructor.
     * @param ClientInterface $client
     * @param AggregateRoot $aggregate
     */
    public function __construct(ClientInterface $client, AggregateRoot $aggregate, User $user)
    {
        $this->client = $client;
        $this->aggregate = $aggregate;
        $this->userClientData = $user;
    }

    public function transacction(): ResponseInterface
    {}

    public function verifyTransaction(): ResponseInterface
    {}

    protected function createMethod(): array
    {}

    protected function createData(): array
    {}
}