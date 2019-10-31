<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Gateway\Card\Domain;

use PagoFacil\Gateway\Shared\Domain\Aggregate\Abstracts\AggregateRoot;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\User\Customer\Domain\User;


class Card extends AggregateRoot
{
    /** @var Uuid $uuid */
    private $uuid = null;
    /** @var string $accountNumber  */
    private $accountNumber = null;
    /** @var string $expirationMonth */
    private $expirationMonth = null;
    /** @var string $expirationYear */
    private $expirationYear = null;
    /** @var string $ctv */
    private $ctv = null;
    /** @var User $user */
    private $user = null;

    public function __construct(
        Uuid $uuid, string $accountNumber, string $expirationMonth, string $expirationYear, string $ctv, User $user
    )
    {
        $this->uuid = $uuid;
        $this->accountNumber = $accountNumber;
        $this->expirationMonth = $expirationMonth;
        $this->expirationYear = $expirationYear;
        $this->ctv = $ctv;
        $this->user = $user;
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
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
}