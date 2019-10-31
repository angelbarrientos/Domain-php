<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Gateway\Order\Domain;

use PagoFacil\Gateway\User\Customer\Domain\User;
use PagoFacil\Gateway\Shared\Domain\Aggregate\Abstracts\AggregateRoot;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;


class Order extends AggregateRoot
{
    /** @var Uuid $id */
    private $id = null;
    /** @var string $idOrder */
    private $idOrder = null;
    /** @var float $total */
    private $total = null;
    /** @var User $user */
    private $user = null;

    public function __construct(
        Uuid $id, string $idOrder, float $total, User $user
    )
    {
        $this->id = $id;
        $this->idOrder = $idOrder;
        $this->total = $total;
        $this->user = $user;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIdOrder(): string
    {
        return $this->idOrder;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}