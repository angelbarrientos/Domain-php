<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;
use PagoFacil\Gateway\Gateway\Order\Domain\Order;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\User\Client\Domain\User as Client;
use PagoFacil\Gateway\User\Customer\Domain\User as Customer;

class Transaction extends AggregateRoot
{
    /** @var TransactionId $id */
    private $id = null;
    /** @var Client $userClient */
    private $userClient = null;
    /** @var Customer $userCustomer */
    private $userCustomer = null;
    /** @var Order $order */
    private $order = null;
    /** @var Card $card */
    private $card = null;

    /**
     * Transaction constructor.
     * @param TransactionId $id
     * @param Client $userClient
     * @param Customer $userCustomer
     * @param Order $order
     * @param Card $card
     */
    public function __construct(
        TransactionId $id,
        Client $userClient,
        Customer $userCustomer,
        Order $order,
        Card $card
    )
    {
        $this->id = $id;
        $this->userClient = $userClient;
        $this->userCustomer = $userCustomer;
        $this->order = $order;
        $this->card = $card;
        parent::__construct($this->id);
    }

    public static function addResponse(self $transaction): self
    {
        return $transaction;
    }

    /**
     * @return TransactionId
     */
    public function getId(): TransactionId
    {
        return $this->id;
    }

    /**
     * @return Client
     */
    public function getUserClient(): Client
    {
        return $this->userClient;
    }

    /**
     * @return Customer
     */
    public function getUserCustomer(): Customer
    {
        return $this->userCustomer;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }
}
