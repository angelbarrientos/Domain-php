<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Order\Domain;

use PagoFacil\Gateway\User\Customer\Domain\User;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
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
    /** @var string $plan */
    private $plan = null;
    /** @var string $months */
    private $months = null;

    /**
     * Order constructor.
     * @param Uuid $id
     * @param string $idOrder
     * @param float $total
     * @param User $user
     * @param string $plan
     * @param string $months
     */
    public function __construct(
        Uuid $id,
        string $idOrder,
        float $total,
        User $user,
        string $plan,
        string $months
    ) {
        $this->id = $id;
        $this->idOrder = $idOrder;
        $this->total = $total;
        $this->user = $user;
        $this->plan = $plan;
        $this->months = $months;
        parent::__construct($this->id);
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

    /**
     * @return string
     */
    public function getPlan(): string
    {
        return $this->plan;
    }

    /**
     * @return string
     */
    public function getMonths(): string
    {
        return $this->months;
    }
}
