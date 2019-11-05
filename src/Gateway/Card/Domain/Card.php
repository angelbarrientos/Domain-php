<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Domain;

use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\Gateway\Card\Domain\CardId;
use PagoFacil\Gateway\User\Customer\Domain\User;

class Card extends AggregateRoot
{
    /** @var CardId $uuid */
    private $uuid = null;
    /** @var string $accountNumber  */
    protected $accountNumber = null;
    /** @var string $expirationMonth */
    protected $expirationMonth = null;
    /** @var string $expirationYear */
    protected $expirationYear = null;
    /** @var string $ctv */
    protected $ctv = null;
    /** @var string $cardType */
    protected $cardType = null;
    /** @var string $sender */
    protected $sender = null;
    /** @var User $user */
    private $user = null;
    /** @var string $hashKeyCC */
    protected $hashKeyCC = null;

    public function __construct(
        CardId $uuid,
        string $accountNumber,
        string $expirationMonth,
        string $expirationYear,
        string $ctv,
        User $user
    ) {
        $this->uuid = $uuid;
        $this->accountNumber = $accountNumber;
        $this->expirationMonth = $expirationMonth;
        $this->expirationYear = $expirationYear;
        $this->ctv = $ctv;
        $this->user = $user;
        parent::__construct($this->uuid);
    }

    /**
     * @return CardId
     */
    public function getUuid(): CardId
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getExpirationMonth(): string
    {
        return $this->expirationMonth;
    }

    /**
     * @return string
     */
    public function getExpirationYear(): string
    {
        return $this->expirationYear;
    }

    /**
     * @return string
     */
    public function getCtv(): string
    {
        return $this->ctv;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->cardType;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @return string
     */
    public function getHashKeyCC(): string
    {
        return $this->hashKeyCC;
    }
}
